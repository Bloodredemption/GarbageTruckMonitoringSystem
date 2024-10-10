<?php

use App\Http\Controllers\BarangayController;
use App\Http\Controllers\CollectionScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DumpTruckController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WasteCollectionController;
use App\Http\Controllers\WasteCompositionController;
use App\Http\Controllers\WasteConversionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Start Admin Side //

// Dashboard
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Live Tracking
Route::get('/admin/live-tracking', function () {
    return view('admin.live-tracking.index');
})->name('live-tracking');

// Collection Schedule
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/collection-schedule', [CollectionScheduleController::class, 'index'])->name('cs.index');
    Route::get('/collection-schedule/getBrgy', [CollectionScheduleController::class, 'getBrgy'])->name('cs.getBrgy');
    Route::get('/collection-schedule/getDumptruck', [CollectionScheduleController::class, 'getDumptruck'])->name('cs.getDumptruck');
    Route::get('/collection-schedule/events', [CollectionScheduleController::class, 'events'])->name('cs.events');
    Route::post('/collection-schedule/store', [CollectionScheduleController::class, 'store'])->name('cs.store');
    Route::get('/collection-schedule/{id}/edit', [CollectionScheduleController::class, 'edit'])->name('cs.edit');
    Route::put('/collection-schedule/{id}/update', [CollectionScheduleController::class, 'update']);
    Route::delete('/collection-schedule/{id}/delete', [CollectionScheduleController::class, 'destroy'])->name('cs.delete');
})->middleware('auth');

// Waste Composition
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/waste-composition', [WasteCompositionController::class, 'admin_index'])->name('awc.index');
});

// Waste Conversion
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/waste-conversion', [WasteConversionController::class, 'admin_index'])->name('awcov.index');
});

// Dump Trucks
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dump-trucks', [DumpTruckController::class, 'index'])->name('dump-trucks.index');
    Route::get('/dump-trucks/getDrivers', [DumpTruckController::class, 'getDrivers'])->name('drivers.index');
    Route::post('/dump-trucks/store', [DumpTruckController::class, 'store'])->name('dump-trucks.store');
    Route::get('/dump-truck/{id}/edit', [DumpTruckController::class, 'edit'])->name('dump-truck.edit');
    Route::put('/dump-truck/{id}/update', [DumpTruckController::class, 'update'])->name('dump-truck.update');
    Route::delete('/dump-truck/{id}/delete', [DumpTruckController::class, 'destroy'])->name('dump-truck.delete');
});

// Barangay
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/barangay', [BarangayController::class, 'index'])->name('barangays.index');
    Route::get('/barangay/getArchive', [BarangayController::class, 'getArchive'])->name('barangays.getArchive');
    Route::post('/barangay', [BarangayController::class, 'store'])->name('barangays.store');
    Route::get('/barangay/{id}/edit', [BarangayController::class, 'edit'])->name('barangay.edit');
    Route::put('/barangay/{id}/update', [BarangayController::class, 'update'])->name('barangay.update');
    Route::put('/barangay/{id}/archive', [BarangayController::class, 'archive'])->name('barangay.archive');
    Route::put('/barangay/{id}/restore', [BarangayController::class, 'restore'])->name('barangay.restore');
    Route::delete('/barangay/{id}/delete', [BarangayController::class, 'destroy'])->name('barangay.delete');
});

// Notifications
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/getDrivers', [NotificationController::class, 'getDrivers'])->name('notifications.getDrivers');
    Route::get('/notifications/{id}/send', [NotificationController::class, 'sendNotification'])->name('notifications.send');
    Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
    Route::put('/notifications/{id}/update', [NotificationController::class, 'update'])->name('notifications.update');
    Route::delete('/notifications/{id}/delete', [NotificationController::class, 'destroy'])->name('notifications.delete');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
});

// Residents Concerns
Route::get('/admin/residents-concerns', function () {
    return view('admin.residents-concerns.index');
})->name('residents-concerns');

// Users
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/getArchive', [UsersController::class, 'getArchive'])->name('users.getArchive');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
    Route::put('/users/{id}/update', [UsersController::class, 'update']);
    Route::put('/users/{id}/delete', [UsersController::class, 'destroy']);
    Route::put('/users/{id}/archive', [UsersController::class, 'archive']);
    Route::put('/users/{id}/restore', [UsersController::class, 'restore']);
    route::get('/users/{id}/show', [UsersController::class, 'show'])->name('users.show');
});

// Help
Route::get('/admin/help', function () {
    return view('admin.help.index');
})->name('help');

// Profile
Route::get('/admin/profile', function () {
    return view('admin.profile.index');
})->name('profile');

// End Admin Side //

// Start Landfill Side //

// Dashboard
Route::get('/landfill/dashboard', function () {
    return view('landfill.dashboard');
})->name('lf.dashboard');

// Waste Collection
Route::prefix('landfill')->middleware('auth')->group(function () {
    Route::get('/waste-collection', [WasteCollectionController::class, 'index'])->name('lwc.index');
    Route::get('/waste-collection/getBarangay', [WasteCompositionController::class, 'getBarangay'])->name('lwc.getBrgy');
    Route::post('/waste-collection', [WasteCompositionController::class, 'store'])->name('lwc.store');
    Route::get('/waste-collection/{id}/edit', [WasteCompositionController::class, 'edit']);
    Route::put('/waste-collection/{id}/update', [WasteCompositionController::class, 'update']);
    Route::put('/waste-collection/{id}/delete', [WasteCompositionController::class, 'destroy']);
});


// Waste Conversions
Route::prefix('landfill')->middleware('auth')->group(function () {
    Route::get('/waste-conversions', [WasteConversionController::class, 'index'])->name('wcov.index');
    Route::get('/waste-conversions/wasteType', [WasteConversionController::class, 'wasteType'])->name('wcov.wasteType');
    Route::post('/waste-conversions', [WasteConversionController::class, 'store'])->name('wcov.store');
    Route::get('/waste-conversions/{id}/edit', [WasteConversionController::class, 'edit']);
    Route::put('/waste-conversions/{id}/update', [WasteConversionController::class, 'update']);
    Route::put('/waste-conversions/{id}/delete', [WasteConversionController::class, 'destroy']);
});

// Help
Route::get('/landfill/help', function () {
    return view('landfill.help.index');
})->name('lf.help');

// End Landfill Side //

// Start Driver Side //

// Dashboard
Route::get('/driver/dashboard', function () {
    return view('driver.dashboard');
})->name('d.dashboard');

// Waste Composition
Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/waste-composition', [WasteCompositionController::class, 'index'])->name('wc.index');
    Route::get('/waste-composition/getBarangay', [WasteCompositionController::class, 'getBarangay'])->name('wc.getBrgy');
    Route::post('/waste-composition', [WasteCompositionController::class, 'store'])->name('wc.store');
    Route::get('/waste-composition/{id}/edit', [WasteCompositionController::class, 'edit']);
    Route::put('/waste-composition/{id}/update', [WasteCompositionController::class, 'update']);
    Route::put('/waste-composition/{id}/delete', [WasteCompositionController::class, 'destroy']);
});

// Collection Schedule
Route::get('/driver/collection-schedule', function () {
    return view('driver.collection-schedule.index');
})->name('d.collection-schedule');

// End Driver Side //