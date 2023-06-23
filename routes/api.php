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
        Route::post('/status', [APIPHIMController::class, 'status'])->name('phimStatus');
        Route::post('/info', [APIPHIMController::class, 'info'])->name('phimInfo');
        Route::post('/delete', [APIPHIMController::class, 'destroy'])->name('phimDel');
    });
    Route::group(['prefix' => '/phong-chieu'], function () {
        Route::post('/create', [APIPhongChieuController::class, 'store'])->name('phongchieuStore');
        Route::post('/data', [APIPhongChieuController::class, 'data'])->name('phongchieuData');
        Route::post('/status', [APIPhongChieuController::class, 'status'])->name('phongchieuStatus');
        Route::post('/info', [APIPhongChieuController::class, 'info'])->name('phongchieuInfo');
        Route::post('/delete', [APIPhongChieuController::class, 'delete'])->name('phongchieuDelete');
    });
});
