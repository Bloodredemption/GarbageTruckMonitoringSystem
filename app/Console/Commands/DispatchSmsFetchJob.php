<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\FetchSmsJob;

class DispatchSmsFetchJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:dispatch-fetch-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch SMS fetch jobs every minute';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = '60fb227e-604a-4ca9-a8a4-000febc38bae'; // Set your API Key
        $deviceId = '6732ba5a58ae3b6550860fd2'; // Set your Device ID

        // Dispatch the job to fetch SMS every minute (or adjust interval as needed)
        while (true) {
            FetchSmsJob::dispatch($apiKey, $deviceId);
            $this->info('Dispatching SMS fetch job...');
            sleep(30); // Sleep for 30 seconds before dispatching again
        }
    }
}
