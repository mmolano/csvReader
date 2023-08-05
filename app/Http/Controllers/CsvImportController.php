<?php

namespace App\Http\Controllers;

use App\Jobs\CsvImportJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use League\Csv\Reader;

class CsvImportController extends Controller
{
    public function import(Request $request): RedirectResponse
    {
        try {
            $this->validate($request, [
                'file' => 'required|mimes:csv,txt',
            ]);

            $filePath = $request->file('file')->path();
            $csv = Reader::createFromPath($filePath, 'r');

            $records = $csv->getRecords();
            $values = [];
            foreach ($records as $offset => $record) {
                if ($offset < 2) {
                    // skip the header for this specific CSV has to be changed for other CSV's
                    continue;
                }
                if ($offset == 2) {
                    $values['dates'] = $record;
                } else {
                    $values['prefectures'][] = $record;
                }
            }

            foreach ($values['dates'] as $i => $date) {
                foreach ($values['prefectures'] as $j => $prefectureData) {
                    if ($i === 0) {
                        continue;
                    }
                    $population = $prefectureData[$i];
                    // Convert population to UTF-8
                    $population = mb_convert_encoding($population, "UTF-8", mb_detect_encoding($population, "JIS,SJIS,eucjp-win"));

                    CsvImportJob::dispatch($date, $population, $prefectureData[0]);
                }
            }


            return redirect()->back()->with('success', 'CSV import has been completed.');
        } catch (\Exception $e) {
            Log::error('Could not import the CSV main', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred during CSV import.');
        }
    }
}
