<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
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
Route::get('/admin/dump-trucks', function () {
    return view('admin.dump-trucks.index');
})->name('dump-trucks');

// Barangay
Route::get('/admin/barangay', function () {
    return view('admin.barangay.index');
})->name('barangay');

// Notifications
Route::get('/admin/notifications', function () {
    return view('admin.notifications.index');
})->name('notifications');

// Residents Concerns
Route::get('/admin/residents-concerns', function () {
    return view('admin.residents-concerns.index');
})->name('residents-concerns');

// Users
Route::get('/admin/users', [UsersController::class, 'index'])->middleware('auth')->name('users');
Route::post('/admin/users', [UsersController::class, 'store'])->name('users.store');

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