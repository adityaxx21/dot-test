<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::middleware('custom_auth')->group(function () {
    // Your authenticated routes here
    Route::get('/user', [UserController::class, 'profile']);

    // Getting Data From API
    Route::prefix('search')->group(function () {
        Route::get('/city', [RegionController::class, 'searchCities']);
        Route::get('/province', [RegionController::class, 'searchProvinces']);
    });
});
