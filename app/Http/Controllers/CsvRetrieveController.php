<?php

namespace App\Http\Controllers;

use App\Models\PopulationData;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CsvRetrieveController extends Controller
{
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'prefecture' => ['string'],
            'date' => ['string'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with('error', 'An error occurred while getting the data');
        }

        $populationData = PopulationData::where('prefecture', $request->prefecture)
            ->where('year', $request->date)
            ->get();

        return view('allData', compact('populationData'));
    }
}
