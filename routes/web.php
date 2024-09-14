<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/live-tracking', function () {
    return view('admin.live-tracking.index');
})->name('live-tracking');

Route::get('/admin/collection-schedule', function () {
    return view('admin.collection-schedule.index');
})->name('collection-schedule');

Route::get('/admin/waste-composition', function () {
    return view('admin.waste-composition.index');
})->name('waste-composition');

Route::get('/admin/waste-conversion', function () {
    return view('admin.waste-conversion.index');
})->name('waste-conversion');

Route::get('/admin/dump-trucks', function () {
    return view('admin.dump-trucks.index');
})->name('dump-trucks');

Route::get('/admin/barangay', function () {
    return view('admin.barangay.index');
})->name('barangay');

Route::get('/admin/notifications', function () {
    return view('admin.notifications.index');
})->name('notifications');