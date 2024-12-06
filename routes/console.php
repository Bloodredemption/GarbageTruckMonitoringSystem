<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\FetchReceivedSms;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('sms:fetch', function () {
    $this->call(FetchReceivedSms::class);
})->everyMinute(); // You can adjust the frequency here