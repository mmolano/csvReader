<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CsvImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $dates;
    protected string $prefectures;
    protected string $population;

    /**
     * Create a new job instance.
     */
    public function __construct(string $dates, string $population, string $prefectures)
    {
        $this->dates = $dates;
        $this->population = $population;
        $this->prefectures = $prefectures;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            DB::table('population_data')->insert([
                'prefecture' => $this->prefectures,
                'year' => $this->dates == "" ? "*" : $this->dates,
                'population' => $this->population,
            ]);
        } catch (\Exception $e) {
            Log::error('Could insert the data', ['message' => $e->getMessage()]);
            $this->release(10);
        }
    }
}
