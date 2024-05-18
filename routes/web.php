<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoanphiController;
use App\Http\Controllers\DoanvienController;
use App\Http\Controllers\LichController;
use App\Http\Controllers\RenluyenController;
use App\Http\Controllers\ThongkeController;
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
    })->name('index');

    Route::get('/doanphi', [DoanphiController::class, 'view']);

    Route::get('/doanvien', [DoanvienController::class, 'view']);
    Route::get('/doanvien/sua', [DoanvienController::class, 'viewUpdate']);
    Route::get('/doanvien/xoa', [DoanvienController::class, 'viewDelete']);

    Route::get('/renluyen', [RenluyenController::class, 'view']);

    Route::get('/thongke', [ThongkeController::class, 'view']);

    Route::resource('lich', LichController::class);
});

Route::fallback(function () {
    return redirect()->route('index');
});
