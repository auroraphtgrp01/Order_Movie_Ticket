<?php

use App\Http\Controllers\APIAdminController;
use App\Http\Controllers\APIDichVuController;
use App\Http\Controllers\APIDonViController;
use App\Http\Controllers\APIGheChieuController;
use App\Http\Controllers\APIHomePageController;
use App\Http\Controllers\APILichChieuController;
use App\Http\Controllers\APIMovieDetailController;
use App\Http\Controllers\APIPHIMController;
use App\Http\Controllers\APIPhongChieuController;
use App\Http\Controllers\CustomerAccountController;
use Illuminate\Support\Facades\Route;

Route::post('/homepage', [APIHomePageController::class, 'data'])->name('HomePageData');
Route::post('/details', [APIMovieDetailController::class, 'data'])->name('MovieDetail');
//
Route::group(['prefix' => '/admin'], function () {
    // Quản lý phim
    Route::group(['prefix' => '/phim'], function () {
        Route::post('/create', [APIPHIMController::class, 'store'])->name('phimStore');
        Route::post('/data', [APIPHIMController::class, 'data'])->name('phimData');
        Route::post('/status', [APIPHIMController::class, 'status'])->name('phimStatus');
        Route::post('/info', [APIPHIMController::class, 'info'])->name('phimInfo');
        Route::post('/delete', [APIPHIMController::class, 'destroy'])->name('phimDel');
        Route::post('/update', [APIPHIMController::class, 'update'])->name('phimUpdate');
    });
    Route::group(['prefix' => '/phong-chieu'], function () {
        Route::post('/create', [APIPhongChieuController::class, 'store'])->name('phongchieuStore');
        Route::post('/data', [APIPhongChieuController::class, 'data'])->name('phongchieuData');
        Route::post('/status', [APIPhongChieuController::class, 'status'])->name('phongchieuStatus');
        Route::post('/info', [APIPhongChieuController::class, 'info'])->name('phongchieuInfo');
        Route::post('/delete', [APIPhongChieuController::class, 'delete'])->name('phongchieuDelete');
        Route::post('/update', [APIPhongChieuController::class, 'update'])->name('phongchieuUpdate');
    });
    Route::group(['prefix' => '/ghe_chieu'], function () {
        Route::post('/create', [APIGheChieuController::class, 'store'])->name('gheChieuStore');
        Route::post('/info', [APIGheChieuController::class, 'info'])->name('infoPhongGhe');
        Route::post('/status', [APIGheChieuController::class, 'status'])->name('gheChieuStatus');
        Route::post('/update', [APIGheChieuController::class, 'update'])->name('gheChieuUpdate');
    });
    // QUAN LY ACCOUNT
    Route::group(['prefix' => '/danh-sach-account'], function () {
        Route::post('/create', [CustomerAccountController::class, 'store'])->name('taiKhoanStore');
        Route::post('/data', [CustomerAccountController::class, 'data'])->name('taiKhoanData');
        Route::post('/block', [CustomerAccountController::class, 'block'])->name('taiKhoanBlock');
        Route::post('/tinh_trang', [CustomerAccountController::class, 'tinh_trang'])->name('taiKhoanTinhTrang');
        Route::post('/delete', [CustomerAccountController::class, 'destroy'])->name('taiKhoanDel');
        Route::post('/update', [CustomerAccountController::class, 'update'])->name('taiKhoanUpdate');
    });
    Route::group(['prefix'  =>  '/don-vi'], function () {
        Route::post('/create', [APIDonViController::class, 'store'])->name('donViStore');
        Route::post('/data', [APIDonViController::class, 'data'])->name('donViData');
        Route::post('/del', [APIDonViController::class, 'destroy'])->name('donViDel');
        Route::post('/update', [APIDonViController::class, 'update'])->name('donViUpdate');
    });
    Route::group(['prefix' => '/dich-vu'], function () {
        Route::post('/create', [APIDichVuController::class, 'store'])->name('dichVuStore');
        Route::post('/data', [APIDichVuController::class, 'data'])->name('dichVuData');
        Route::post('/status', [APIDichVuController::class, 'status'])->name('dichVuStatus');
        Route::post('/update', [APIDichVuController::class, 'update'])->name('dichVuUpdate');
        Route::post('/delete', [APIDichVuController::class, 'delete'])->name('dichVuDelete');
    });
    Route::group(['prefix' => '/lich-chieu'], function () {
        Route::post('/store', [APILichChieuController::class, 'store'])->name('lichChieuStore');
        Route::post('/data', [APILichChieuController::class, 'data'])->name('lichChieuData');
        Route::post('/status', [APILichChieuController::class, 'status'])->name('lichChieuStatus');
        Route::post('/update', [APILichChieuController::class, 'update'])->name('lichChieuUpdate');
        Route::post('/delete', [APILichChieuController::class, 'delete'])->name('lichChieuDelete');
    });
    Route::group(['prefix' => '/admin-manage'], function () {
        Route::post('/data', [APIAdminController::class, 'data'])->name('adminData');
        Route::post('/store', [APIAdminController::class, 'store'])->name('adminStore');
        Route::post('/destroy', [APIAdminController::class, 'destroy'])->name('adminDelete');
        Route::post('/status', [APIAdminController::class, 'status'])->name('adminStatus');
        Route::post('/update', [APIAdminController::class, 'update'])->name('adminUpdate');
    });
});
Route::group(['prefix' => '/movie-details'], function () {
    Route::post('/dataset', [APIMovieDetailController::class, 'data'])->name('DataMovieSet');
    Route::post('/dataget', [APIMovieDetailController::class, 'dataGet'])->name('MovieDataGet');
});
