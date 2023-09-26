        <?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\APIVeXemPhimController;
use App\Http\Controllers\APIAdminController;
use App\Http\Controllers\APIDichVuController;
use App\Http\Controllers\APIDonViController;
use App\Http\Controllers\APIGheChieuController;
use App\Http\Controllers\APIHomePageController;
use App\Http\Controllers\APILichChieuController;
use App\Http\Controllers\APIMovieDetailController;
use App\Http\Controllers\APIPhanQuyenController;
use App\Http\Controllers\APIPHIMController;
use App\Http\Controllers\APIPhongChieuController;
use App\Http\Controllers\APIThongKeController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// ROUTE CLIENT
Route::post('/homepage', [APIHomePageController::class, 'data'])->name('HomePageData');
Route::post('/details', [APIMovieDetailController::class, 'data'])->name('MovieDetail');
Route::post('/reset-password', [CustomerAccountController::class, 'resetPassword'])->name('resetPassword');
Route::group(['prefix' => '/client'], function () {
    Route::post('/lich-chieu-theo-phim', [APILichChieuController::class, 'lich_chieu_theo_phim'])->name('lichChieuPhim');
    Route::post('/order', [APIVeXemPhimController::class, 'order']);
});
Route::post('/movie-details/dataset', [APIMovieDetailController::class, 'data'])->name('DataMovieSet');
Route::group(['prefix' => '/movie-details', 'middleware' => 'APIClient'], function () {
    Route::post('/get-ve', [APIMovieDetailController::class, 'getVe'])->name('MovieGetVe');
    Route::post('/order', [APIMovieDetailController::class, 'order']);
});
Route::post('/movie-detail/cart',[APIMovieDetailController::class, 'cart']);
Route::post('/movie-detail/cart/payment',[APIMovieDetailController::class, 'payment']);
Route::post('/payment',[APIMovieDetailController::class, 'paymentOrd']);
Route::post('/payment/check', [PaymentController::class, 'paymentCheck']);
Route::post('/payment/qrpay', [PaymentController::class, 'qrPay']);
Route::post('/header/userInfo', [CustomerAccountController::class, 'userInfo']);
Route::post('/header/logout', [CustomerAccountController::class, 'logOut']);
Route::post('/customer/order-list', [CustomerAccountController::class, 'orderList']);
Route::post('/customer/list-ticket', [CustomerAccountController::class, 'ticketList']);
// -----------------------------------------------------------------------------------------------------------------------------------
// ROUTE ADMIN

Route::post('/admin/login', [APIAdminController::class, 'loginAdmin']);
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
    // Quản lý phòng chiếu
    Route::group(['prefix' => '/phong-chieu'], function () {
        Route::post('/create', [APIPhongChieuController::class, 'store'])->name('phongchieuStore');
        Route::post('/data', [APIPhongChieuController::class, 'data'])->name('phongchieuData');
        Route::post('/status', [APIPhongChieuController::class, 'status'])->name('phongchieuStatus');
        Route::post('/info', [APIPhongChieuController::class, 'info'])->name('phongchieuInfo');
        Route::post('/delete', [APIPhongChieuController::class, 'delete'])->name('phongchieuDelete');
        Route::post('/update', [APIPhongChieuController::class, 'update'])->name('phongchieuUpdate');
    });
    // Quản lý ghế chiếu
    Route::group(['prefix' => '/ghe-chieu'], function () {
        Route::post('/create', [APIGheChieuController::class, 'store'])->name('gheChieuStore');
        Route::post('/info', [APIGheChieuController::class, 'info'])->name('infoPhongGhe');
        Route::post('/status', [APIGheChieuController::class, 'status'])->name('gheChieuStatus');
        Route::post('/update', [APIGheChieuController::class, 'update'])->name('gheChieuUpdate');
    });
    // Quản lý tài khoản
    Route::group(['prefix' => '/danh-sach-account'], function () {
        Route::post('/create', [CustomerAccountController::class, 'store'])->name('taiKhoanStore');
        Route::post('/data', [CustomerAccountController::class, 'data'])->name('taiKhoanData');
        Route::post('/block', [CustomerAccountController::class, 'block'])->name('taiKhoanBlock');
        Route::post('/tinh_trang', [CustomerAccountController::class, 'tinh_trang'])->name('taiKhoanTinhTrang');
        Route::post('/delete', [CustomerAccountController::class, 'destroy'])->name('taiKhoanDel');
        Route::post('/update', [CustomerAccountController::class, 'update'])->name('taiKhoanUpdate');
        Route::post('/login', [CustomerAccountController::class, 'login'])->name('taiKhoanLogin');
        Route::post('/forget', [CustomerAccountController::class, 'forget']);
        Route::post('/reset', [CustomerAccountController::class, 'changePassword']);
    });
    // Quản lý đơn vị
    Route::group(['prefix' => '/don-vi'], function () {
        Route::post('/create', [APIDonViController::class, 'store'])->name('donViStore');
        Route::post('/data', [APIDonViController::class, 'data'])->name('donViData');
        Route::post('/del', [APIDonViController::class, 'destroy'])->name('donViDel');
        Route::post('/update', [APIDonViController::class, 'update'])->name('donViUpdate');
    });
    // Quản lý dịch vụ
    Route::group(['prefix' => '/dich-vu'], function () {
        Route::post('/create', [APIDichVuController::class, 'store'])->name('dichVuStore');
        Route::post('/data', [APIDichVuController::class, 'data'])->name('dichVuData');
        Route::post('/status', [APIDichVuController::class, 'status'])->name('dichVuStatus');
        Route::post('/update', [APIDichVuController::class, 'update'])->name('dichVuUpdate');
        Route::post('/delete', [APIDichVuController::class, 'delete'])->name('dichVuDelete');
    });
    // Quản lý lịch chiếu
    Route::group(['prefix' => '/lich-chieu'], function () {
        Route::post('/store', [APILichChieuController::class, 'store'])->name('lichChieuStore');
        Route::post('/data', [APILichChieuController::class, 'data'])->name('lichChieuData');
        Route::post('/status', [APILichChieuController::class, 'status'])->name('lichChieuStatus');
        Route::post('/update', [APILichChieuController::class, 'update'])->name('lichChieuUpdate');
        Route::post('/delete', [APILichChieuController::class, 'delete'])->name('lichChieuDelete');
        Route::post('/info', [APILichChieuController::class, 'info'])->name('lichChieuInfo');
    });
    // Quản lý admin
    Route::group(['prefix' => '/admin-manage'], function () {
        Route::post('/data', [APIAdminController::class, 'data'])->name('adminData');
        Route::post('/store', [APIAdminController::class, 'store'])->name('adminStore');
        Route::post('/destroy', [APIAdminController::class, 'destroy'])->name('adminDelete');
        Route::post('/status', [APIAdminController::class, 'status'])->name('adminStatus');
        Route::post('/update', [APIAdminController::class, 'update'])->name('adminUpdate');
    });
    // Quản lý phân quyền
    Route::group(['prefix' => '/phan-quyen'], function () {
        Route::post('/data', [APIPhanQuyenController::class, 'data']);
        Route::post('/data-chuc-nang', [APIPhanQuyenController::class, 'dataChucNang']);
        Route::post('/create', [APIPhanQuyenController::class, 'create']);
        Route::post('/status', [APIPhanQuyenController::class, 'status']);
        Route::post('/update', [APIPhanQuyenController::class, 'update']);
        Route::post('/delete', [APIPhanQuyenController::class, 'delete']);
        Route::post('/add', [APIPhanQuyenController::class, 'phanQuyen']);
    });
    Route::group(['prefix' => '/thong-ke'], function () {
        Route::post('/bt-1', [APIThongKeController::class, 'bt1']);
    });
    Route::post('/logout', [APIAdminController::class, 'logout']);
});
