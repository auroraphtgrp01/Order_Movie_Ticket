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
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestViewController;
use App\Http\Controllers\ThongKeController;
use App\Models\DanhSachTaiKhoan;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\TestView;



// ROUTE CLIENT
Route::get('/confirmation/{id}',[CustomerAccountController::class, 'confirmation']);
Route::get('/', [HomePageController::class, 'index']);
Route::get('/movie-detail/{slug}', [HomePageController::class, 'details']);
Route::get('/register', [CustomerAccountController::class, 'viewResgister']);
Route::get('/login', [CustomerAccountController::class, 'viewLogin']);
Route::get('/forgot-password', [CustomerAccountController::class, 'viewForgotPassword']);
Route::get('/change-password/{id}', [CustomerAccountController::class, 'viewChangePassword']);
Route::get('/admin/login', [AdminController::class, 'loginView']);
Route::get('/dang-ky', [AuthenticationController::class, 'signup']);
Route::get('/dang-nhap', [AuthenticationController::class, 'signin']);
Route::get('/index', [TestController::class, 'index']);
Route::get('/movie-detail/{slug}/cart/{id_lich_chieu}', [HomePageController::class, 'cart']);
Route::get('/payment', [HomePageController::class, 'payment']);
Route::get('/order-list', [HomePageController::class, 'orderList']);

//
Route::get('/test', [TestViewController::class, 'paymentCheck']);

// ROUTE ADMIN
Route::group(['prefix' => '/admin', 'middleware' => 'WebAdmin'], function () {
    Route::get('/', [AdminController::class, 'adminManage']);
    // Quản lý phim
    Route::group(['prefix' => '/phim'], function () {
        Route::get('/', [PhimController::class, 'index']);
    });
    Route::group(['prefix' => '/phan-quyen'], function () {
        Route::get('/', [PhanQuyenController::class, 'index']);
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
    Route::group(['prefix' => '/thong-ke'], function () {
        Route::get('/', [ThongKeController::class, 'index']);
    });
});
//
