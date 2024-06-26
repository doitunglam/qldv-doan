<?php

use App\Http\Controllers\API\ChidoanController;
use App\Http\Controllers\API\ChucvuController;
use App\Http\Controllers\API\DoanphiController;
use App\Http\Controllers\API\DoanvienController;
use App\Http\Controllers\API\HoatdongController;
use App\Http\Controllers\API\KhoaController;
use App\Http\Controllers\API\RenluyenController;
use App\Http\Controllers\API\ThongBaoController;
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
    Route::resource('doanvien', DoanvienController::class);

    Route::get('renluyen/{MaCD}/{HocKy}', [RenluyenController::class, 'show']);
    Route::get('renluyen/view/{MaCD}/{HocKy}', [RenluyenController::class, 'showView']);
    Route::post('renluyen', [RenluyenController::class, 'store']);
    Route::put('renluyen', [RenluyenController::class, 'update']);

    Route::resource('chidoan', ChidoanController::class);
    Route::resource('chucvu', ChucvuController::class);
    Route::resource('doanphi', DoanphiController::class);
    Route::get('doanphi/view/{MaCD}', [DoanphiController::class, 'showView']);
    Route::resource('hoatdong', HoatdongController::class);
    Route::resource('khoa', KhoaController::class);

    Route::resource('thongbao', ThongBaoController::class);

});
