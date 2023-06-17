<?php

use App\Http\Controllers\APIPHIMController;
use App\Http\Controllers\APIPhongChieuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class, 'index']);
Route::group(['prefix' => '/admin'], function () {
    // Quản lý phim
    Route::group(['prefix' => '/phim'], function () {
        Route::post('/create', [APIPHIMController::class, 'store'])->name('phimStore');
        Route::post('/data', [APIPHIMController::class, 'data'])->name('phimData');
    });
    Route::group(['prefix' => '/phong-chieu'], function () {
        Route::post('/create', [APIPhongChieuController::class, 'store'])->name('phongchieuStore');
        Route::post('/data', [APIPhongChieuController::class, 'data'])->name('phongchieuData');
    });
});
