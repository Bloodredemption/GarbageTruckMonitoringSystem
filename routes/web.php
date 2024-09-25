<?php

use App\Http\Controllers\BarangayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DumpTruckController;
use App\Http\Controllers\NotificationController;
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
Route::get('/admin/collection-schedule', function () {
    return view('admin.collection-schedule.index');
})->name('collection-schedule');

// Waste Composition
Route::get('/admin/waste-composition', function () {
    return view('admin.waste-composition.index');
})->name('waste-composition');

// Waste Conversion
Route::get('/admin/waste-conversion', function () {
    return view('admin.waste-conversion.index');
})->name('waste-conversion');

// Dump Trucks
Route::prefix('admin')->group(function () {
    Route::get('/dump-trucks', [DumpTruckController::class, 'index'])->name('dump-trucks.index');
    Route::get('/dump-trucks/getDrivers', [DumpTruckController::class, 'getDrivers'])->name('drivers.index');
    Route::post('/dump-trucks/store', [DumpTruckController::class, 'store'])->name('dump-trucks.store');
    Route::get('/dump-truck/{id}/edit', [DumpTruckController::class, 'edit'])->name('dump-truck.edit');
    Route::put('/dump-truck/{id}/update', [DumpTruckController::class, 'update'])->name('dump-truck.update');
    Route::delete('/dump-truck/{id}/delete', [DumpTruckController::class, 'destroy'])->name('dump-truck.delete');
})->middleware('auth');

// Barangay
Route::prefix('admin')->group(function () {
    Route::get('/barangay', [BarangayController::class, 'index'])->name('barangays.index');
    Route::post('/barangay', [BarangayController::class, 'store'])->name('barangays.store');
    Route::get('/barangay/{id}/edit', [BarangayController::class, 'edit'])->name('barangay.edit');
    Route::put('/barangay/{id}/update', [BarangayController::class, 'update'])->name('barangay.update');
    Route::delete('/barangay/{id}/delete', [BarangayController::class, 'destroy'])->name('barangay.delete');
})->middleware('auth');

// Notifications
Route::prefix('admin')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/getDrivers', [NotificationController::class, 'getDrivers'])->name('notifications.getDrivers');
    Route::get('/notifications/{id}/send', [NotificationController::class, 'sendNotification'])->name('notifications.send');
    Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
    Route::put('/notifications/{id}/update', [NotificationController::class, 'update'])->name('notifications.update');
    Route::delete('/notifications/{id}/delete', [NotificationController::class, 'destroy'])->name('notifications.delete');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
})->middleware('auth');

// Residents Concerns
Route::get('/admin/residents-concerns', function () {
    return view('admin.residents-concerns.index');
})->name('residents-concerns');

// Users
Route::prefix('admin')->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
    Route::put('/users/{id}/update', [UsersController::class, 'update']);
    Route::put('/users/{id}/delete', [UsersController::class, 'destroy']);
    route::get('/users/{id}/show', [UsersController::class, 'show'])->name('users.show');
})->middleware('auth');

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
Route::get('/landfill/waste-collection', function () {
    return view('landfill.waste-collection.index');
})->name('lf.waste-collection');

// Recycled Products
Route::get('/landfill/recycled-products', function () {
    return view('landfill.recycled-products.index');
})->name('lf.recycled-products');

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
Route::get('/driver/waste-composition', function () {
    return view('driver.waste-composition.index');
})->name('d.waste-composition');

// Collection Schedule
Route::get('/driver/collection-schedule', function () {
    return view('driver.collection-schedule.index');
})->name('d.collection-schedule');

// End Driver Side //