<?php

use App\Http\Controllers\Api\V1\ClientController;
use App\Http\Controllers\Api\V1\LandUnitController;
use App\Http\Controllers\Api\V1\LandUsageController;
use App\Http\Controllers\Api\V1\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/clients/properties/{id}', [ClientController::class, 'properties']);
Route::apiResource('clients', ClientController::class);

Route::get('/properties/land-units/{id}', [PropertyController::class, 'landUnits']);
Route::apiResource('properties', PropertyController::class);

Route::apiResource('landUnits', LandUnitController::class);
Route::apiResource('landUsage', LandUsageController::class);
