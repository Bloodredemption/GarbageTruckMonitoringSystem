<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ByProductsController;
use App\Http\Controllers\TruckLocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WasteCompositionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/waste-data', [WasteCompositionController::class, 'getWasteData']);

Route::get('/byproducts-data', [ByProductsController::class, 'byProductsAPI']);

Route::get('/brgy-waste-data', [WasteCompositionController::class, 'getBrgyWasteData']);

Route::post('/truck-location', [TruckLocationController::class, 'store']);

Route::get('/getpredicted-data', [AnalyticsController::class, 'brgyWastePrediction']);

Route::get('/byproducts-prediction', [AnalyticsController::class, 'byProductsPrediction']);

Route::get('/waste-prediction', [AnalyticsController::class, 'wastePrediction']);