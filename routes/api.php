<?php

use App\Http\Controllers\API\ChidoanController;
use App\Http\Controllers\API\ChucvuController;
use App\Http\Controllers\API\DoanphiController;
use App\Http\Controllers\API\DoanvienController;
use App\Http\Controllers\API\HoatdongController;
use App\Http\Controllers\API\KhoaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;

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

Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    // Route::resource('sodoan', SoDoanController::class);
    Route::resource('doanvien', DoanvienController::class);
    Route::resource('chidoan', ChidoanController::class);
    Route::resource('chucvu', ChucvuController::class);
    Route::resource('doanphi', DoanphiController::class);
    Route::resource('hoatdong', HoatdongController::class);
    Route::resource('khoa', KhoaController::class);

});
