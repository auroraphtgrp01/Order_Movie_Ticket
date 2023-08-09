<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomePageController::class, 'index']);
Route::get('/movie-detail/{slug}', [HomePageController::class, 'details']);
Route::get('/register', [CustomerAccountController::class, 'viewResgister']);
Route::get('/login', [CustomerAccountController::class, 'viewLogin']);
//
Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [AdminController::class, 'adminManage']);
    // Quản lý phim
    Route::group(['prefix' => '/phim'], function () {
        Route::get('/', [PhimController::class, 'index']);
    });
    Route::group(['prefix' => '/phong-chieu'], function () {
        Route::get('/', [PhongChieuController::class, 'index']);
    });
    Route::group(['prefix' => '/account'], function () {
        Route::get('/', [AuthenticationController::class, 'admin']);
    });
    Route::group(['prefix' => '/ghe-chieu'], function () {
        Route::get('/{id_phong}', [GheChieuController::class, 'index']);
    });
    Route::group(['prefix' => '/danh-sach-account'], function () {
        Route::get('/', [DanhSachTaiKhoanController::class, 'index']);
    });
    Route::group(['prefix' => '/dich-vu'], function () {
        Route::get('/', [DichVuController::class, 'index']);
    });
    Route::group(['prefix' => '/don-vi'], function () {
        Route::get('/', [DonViController::class, 'index']);
    });
    Route::group(['prefix' => '/dich-vu'], function () {
        Route::get('/', [DichVuController::class, 'index']);
    });
    Route::group(['prefix' => '/lich-chieu'], function () {
        Route::get('/', [LichChieuController::class, 'index']);
    });
});
Route::get('/dang-ky', [AuthenticationController::class, 'signup']);
Route::get('/dang-nhap', [AuthenticationController::class, 'signin']);
Route::get('/create', [TestController::class, 'create']);
