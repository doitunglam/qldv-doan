<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoanphiController;
use App\Http\Controllers\DoanvienController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'view'])->name('login');
Route::post('/login', [AuthController::class, 'submit']);

Route::get('/oauth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/oauth/callback/google', [AuthController::class, 'handleGoogleCallback']);

Route::get('/logout', [AuthController::class, 'remove']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/doanphi', [DoanphiController::class, 'view']);
    Route::post('/doanphi/data', [DoanphiController::class, 'getData']);
    Route::post('/doanphi/entry', [DoanphiController::class, 'update']);


    Route::get('/doanvien', [DoanvienController::class, 'view']);
    Route::post('/doanvien/them', [DoanvienController::class, 'create']);
    Route::get('/doanvien/sua', [DoanvienController::class, 'viewUpdate']);
    Route::post('/doanvien/sua', [DoanvienController::class, 'update']);
    Route::get('/doanvien/xoa', [DoanvienController::class, 'viewDelete']);
    Route::post('/doanvien/xoa', [DoanvienController::class, 'delete']);


});
