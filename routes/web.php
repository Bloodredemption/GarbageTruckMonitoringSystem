<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\CollectionScheduleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DumpTruckController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\WasteCollectionController;
use App\Http\Controllers\WasteCompositionController;
use App\Http\Controllers\WasteConversionController;
use App\Http\Controllers\GeolocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentsConcernsController;
use App\Http\Controllers\TruckLocationController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Start Admin Side //

// Dashboard

Route::get('/residents-concerns', [ResidentsConcernsController::class, 'index'])->name('rc.index');
Route::post('/residents-concerns/submit', [ResidentsConcernsController::class, 'store'])->name('rc.store');

Route::post('/geolocation', [GeolocationController::class, 'storeCoordinates']);

Route::get('/get-conversation/{receiver_id}', [MessagesController::class, 'getConversation']);

Route::post('/send-message', [MessagesController::class, 'sendMessage'])->name('send.message');

Route::get('/messages', [MessagesController::class, 'getMessages'])->name('messages.get');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/waste-composition-data', [DashboardController::class, 'getWasteCompositionData']);
    Route::get('/dashboard/highest-weekly', [DashboardController::class, 'getHighestWeeklyWaste']);
    Route::get('/dashboard/getWasteData', [DashboardController::class, 'getWasteData']);
    Route::get('/dashboard/fetchWasteDataForInfo', [DashboardController::class, 'fetchWasteDataForInfo']);
    Route::get('/dashboard/getTodayWasteConverted', [DashboardController::class, 'getTodayWasteConverted'])->name('getTodayWasteConverted');
    Route::get('/dashboard/getDiagnosticData', [DashboardController::class, 'getDiagnosticData'])->name('getDiagnosticData');
});

// Live Tracking
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/vehicle-tracking', [TruckLocationController::class, 'index'])->name('live-tracking');
    Route::get('/vehicle-tracking/fetchCoords', [TruckLocationController::class, 'getLatestLocation']);
});

// Collection Schedule
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/collection-schedule', [CollectionScheduleController::class, 'index'])->name('cs.index');
    Route::get('/collection-schedule/checkConflict', [CollectionScheduleController::class, 'checkConflict'])->name('cs.checkConflict');
    Route::get('/collection-schedule/getBrgy', [CollectionScheduleController::class, 'getBrgy'])->name('cs.getBrgy');
    Route::get('/collection-schedule/getDumptruck', [CollectionScheduleController::class, 'getDumptruck'])->name('cs.getDumptruck');
    Route::get('/collection-schedule/getDriver', [CollectionScheduleController::class, 'getDriver'])->name('cs.getDriver');
    Route::get('/collection-schedule/events', [CollectionScheduleController::class, 'events'])->name('cs.events');
    Route::post('/collection-schedule/store', [CollectionScheduleController::class, 'store'])->name('cs.store');
    Route::get('/collection-schedule/{id}/edit', [CollectionScheduleController::class, 'edit'])->name('cs.edit');
    Route::put('/collection-schedule/{id}/update', [CollectionScheduleController::class, 'update']);
    Route::delete('/collection-schedule/{id}/delete', [CollectionScheduleController::class, 'destroy'])->name('cs.delete');
})->middleware('auth');

// Waste Composition
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/waste-composition', [WasteCompositionController::class, 'admin_index'])->name('awc.index');
    Route::get('/waste-composition/chartsData', [WasteCompositionController::class, 'chartsData']);
    Route::get('/waste-composition/barData', [WasteCompositionController::class, 'barData']);
    Route::post('/waste-composition/importData', [WasteCompositionController::class, 'importData']);
});

// Waste Conversion
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/waste-conversion', [WasteConversionController::class, 'admin_index'])->name('awcov.index');
    Route::get('/waste-conversion/chartsData', [WasteConversionController::class, 'chartsData']);
    Route::get('/waste-conversion/barData', [WasteConversionController::class, 'barData']);
    Route::post('/waste-conversion/importData', [WasteConversionController::class, 'importData']);
});

// Reports
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/reports/waste-collected', [ReportsController::class, 'wasteCollected'])->name('reports.wCol');
    Route::get('/reports/waste-collected/fetch', [ReportsController::class, 'fetchWasteCollectedData'])->name('fetchWcol');
    Route::get('/reports/waste-converted', [ReportsController::class, 'wasteConverted'])->name('reports.wCov');
    Route::get('/reports/waste-converted/wasteDataByTimeframe', [ReportsController::class, 'getWasteDataByTimeframe'])->name('wasteDataByTimeframe');
});

// Dump Trucks
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dump-trucks', [DumpTruckController::class, 'index'])->name('dump-trucks.index');
    Route::get('/dump-trucks/getArchive', [DumpTruckController::class, 'getArchive'])->name('dump-trucks.getArchive');
    Route::post('/dump-trucks/store', [DumpTruckController::class, 'store'])->name('dump-trucks.store');
    Route::get('/dump-truck/{id}/edit', [DumpTruckController::class, 'edit'])->name('dump-truck.edit');
    Route::put('/dump-truck/{id}/update', [DumpTruckController::class, 'update'])->name('dump-truck.update');
    Route::put('/dump-truck/{id}/archive', [DumpTruckController::class, 'archive'])->name('dump-truck.archive');
    Route::put('/dump-truck/{id}/restore', [DumpTruckController::class, 'restore'])->name('dump-truck.restore');
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
    
    Route::get('/notifications/getArchive', [NotificationController::class, 'getArchive'])->name('notifications.getArchive');
    
    Route::get('/notifications/getDrivers', [NotificationController::class, 'getDrivers'])->name('notifications.getDrivers');
    Route::get('/notifications/{id}/send', [NotificationController::class, 'sendNotification'])->name('notifications.send');
    Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
    Route::put('/notifications/{id}/update', [NotificationController::class, 'update'])->name('notifications.update');
    
    Route::put('/notifications/{id}/archive', [NotificationController::class, 'archive']);
    Route::put('/notifications/{id}/restore', [NotificationController::class, 'restore']);

    Route::delete('/notifications/{id}/delete', [NotificationController::class, 'destroy'])->name('notifications.delete');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
});

// Residents Concerns
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/residents-concerns', [ResidentsConcernsController::class, 'admin_index'])->name('residents-concerns');
    Route::get('/residents-concerns/{id}/show', [ResidentsConcernsController::class, 'show'])->name('viewConcerns');
});

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
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/help', [ProfileController::class, 'admin_help'])->name('help');
});

// Profile
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'admin_index'])->name('profile');
    Route::put('/profile/{id}/update', [ProfileController::class, 'admprofileUpdate'])->name('admprofileUpdate');
    Route::put('/profile/{id}/changePassword', [ProfileController::class, 'admchangePassword'])->name('admchangePassword');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}/update', [EventController::class, 'update'])->name('events.update');
});
// End Admin Side //

// Start Landfill Side //

// Dashboard
Route::prefix('landfill')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'landfill_index'])->name('lf.dashboard');
    Route::get('/dashboard/weeklyConvertedWaste', [DashboardController::class, 'lfgetWeeklyWasteData']);
    Route::get('/dashboard/fetchWasteData', [DashboardController::class, 'lffetchWasteData']);
    Route::get('/dashboard/fetchWasteSummary', [DashboardController::class, 'lffetchWasteSummary']);
});

// Waste Collection
Route::prefix('landfill')->middleware('auth')->group(function () {
    Route::get('/waste-composition', [WasteCollectionController::class, 'index'])->name('lwc.index');
    Route::get('/waste-composition/getBarangay', [WasteCompositionController::class, 'getBarangay'])->name('lwc.getBrgy');
    Route::post('/waste-composition/store', [WasteCollectionController::class, 'store'])->name('lwc.store');
    Route::get('/waste-composition/{id}/edit', [WasteCompositionController::class, 'edit']);
    Route::put('/waste-composition/{id}/update', [WasteCompositionController::class, 'update']);
    Route::put('/waste-composition/{id}/delete', [WasteCompositionController::class, 'destroy']);
    
});

// Waste Conversions
Route::prefix('landfill')->middleware('auth')->group(function () {
    Route::get('/waste-conversions', [WasteConversionController::class, 'index'])->name('wcov.index');
    Route::get('/waste-conversions/wasteType', [WasteConversionController::class, 'wasteType'])->name('wcov.wasteType');
    Route::post('/waste-conversions', [WasteConversionController::class, 'store'])->name('wcov.store');
    Route::get('/waste-conversions/{id}/edit', [WasteConversionController::class, 'edit']);
    Route::put('/waste-conversions/{id}/update', [WasteConversionController::class, 'update']);
    Route::put('/waste-conversions/{id}/delete', [WasteConversionController::class, 'destroy']);
    Route::put('/waste-conversions/{id}/finish', [WasteConversionController::class, 'finish']);
    Route::put('/waste-conversions/{id}/restore', [WasteConversionController::class, 'restore']);
    Route::put('/waste-conversions/{id}/archive', [WasteConversionController::class, 'archive']);
    Route::get('/waste-conversions/getArchive', [WasteConversionController::class, 'getArchive'])->name('wcov.getArchive');
});

// Help
Route::get('/landfill/help', function () {
    return view('landfill.help.index');
})->name('lf.help');

// Profile
Route::prefix('landfill')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'landfill_index'])->name('lf.profile');
    Route::put('/profile/{id}/update', [ProfileController::class, 'admprofileUpdate'])->name('lf.profileUpdate');
    Route::put('/profile/{id}/changePassword', [ProfileController::class, 'admchangePassword'])->name('lf.changePassword');
});

// End Landfill Side //

// Start Driver Side //

// Dashboard
Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'driver_index'])->name('d.dashboard');
    Route::get('/dashboard/waste-collection-data', [DashboardController::class, 'getWasteCollectionData']);
});

// Waste Composition
Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/waste-composition', [WasteCompositionController::class, 'index'])->name('wc.index');
    Route::get('/waste-composition/getBarangay', [WasteCompositionController::class, 'getBarangay'])->name('wc.getBrgy');
    Route::get('/waste-composition/getEvent', [WasteCompositionController::class, 'getEvent'])->name('wc.getEvent');
    Route::post('/waste-composition', [WasteCompositionController::class, 'store'])->name('wc.store');
    Route::get('/waste-composition/{id}/edit', [WasteCompositionController::class, 'edit']);
    Route::put('/waste-composition/{id}/update', [WasteCompositionController::class, 'update']);
    Route::put('/waste-composition/{id}/delete', [WasteCompositionController::class, 'destroy']);
    Route::get('/waste-composition/search', [WasteCompositionController::class, 'search'])->name('wc.search');
});

// Collection Schedule
Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/collection-schedule', [CollectionScheduleController::class, 'driver_index'])->name('dcs.index');
    Route::get('/collection-schedule/fetch', [CollectionScheduleController::class, 'fetchByDate'])->name('dcs.fetch');
});

Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'driver_index'])->name('notif.index');
    Route::post('/notifications/markAsRead', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
});

Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'index'])->name('acc.index');
    Route::get('/account/change-password', [ProfileController::class, 'change_pass'])->name('changepass');
    Route::get('/account/personal-information', [ProfileController::class, 'personalinfo'])->name('personalinfo');
    Route::get('/account/personal-information/edit', [ProfileController::class, 'personalinfoedit'])->name('personalinfoedit');
    Route::put('/account/personal-information/edit/{id}/update', [ProfileController::class, 'personalinfoedit_update'])->name('personalinfoeditupdate');
    Route::put('/account/personal-information/edit/{id}/change-password', [ProfileController::class, 'changePassword'])->name('personalinfoeditupdatepass');
    Route::get('/account/help', [ProfileController::class, 'help'])->name('driver.help');
});

// End Driver Side //
