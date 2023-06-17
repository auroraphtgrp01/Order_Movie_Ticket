<?php

use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\TestController;
use App\Models\PhongChieu;
use Illuminate\Support\Facades\Route;




Route::get('/', [TestController::class, 'index']);
Route::group(['prefix' => '/admin'], function () {
    // Quản lý phim
    Route::group(['prefix' => '/phim'], function () {
        Route::get('/', [PhimController::class, 'index']);
    });
    Route::group(['prefix' => '/phong-chieu'], function () {
        Route::get('/', [PhongChieuController::class, 'index']);
    });
});
