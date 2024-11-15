<?php

use App\Http\Controllers\TruckLocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WasteCompositionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/waste-data', [WasteCompositionController::class, 'getWasteData']);

Route::post('/truck-location', [TruckLocationController::class, 'store']);