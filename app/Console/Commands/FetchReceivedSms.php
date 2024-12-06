<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ResidentsConcernsController; 

class FetchReceivedSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch incoming SMS messages and process them';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new ResidentsConcernsController();

        // Call the fetchReceivedSms method to process the SMS
        $controller->fetchReceivedSms();

        // Output a message indicating that the command has run
        $this->info('SMS fetching process has completed.');
    }
}
