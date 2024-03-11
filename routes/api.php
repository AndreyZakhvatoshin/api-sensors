<?php

use App\Http\Controllers\Api\Sensor\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('sensor')
    ->name('sensor.')
    ->group(function () {
        Route::get('temperature', [SensorController::class, 'getTemperature'])->name('temperature');
        Route::get('pressure', [SensorController::class, 'getPressure'])->name('pressure');
        Route::get('revolutions', [SensorController::class, 'getRevolutions'])->name('revolutions');
    });
