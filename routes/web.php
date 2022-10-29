<?php

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

Route::get('/', function () {
    return view('home_page.master');
});

Route::group(['prefix' => '/admin'], function() {
    Route::group(['prefix' => '/danh-muc-san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'store']);
        Route::get('/data', [\App\Http\Controllers\DanhMucSanPhamController::class, 'getData']);

        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'doiTrangThai']);
        Route::get('/delete/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update']);
    });

    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\SanPhamController::class, 'index']);
        Route::post('/tao-san-pham', [\App\Http\Controllers\SanPhamController::class, 'HamTaoSanPham']);

        Route::get('/danh-sach-san-pham', [\App\Http\Controllers\SanPhamController::class, 'getData']);
        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\SanPhamController::class, 'DoiTrangThaiSanPham']);

        Route::get('/xoa-san-pham/{id}', [\App\Http\Controllers\SanPhamController::class, 'XoaSanPham']);
        Route::get('/edit/{id}', [\App\Http\Controllers\SanPhamController::class, 'editSanPham']);
        Route::post('/update', [\App\Http\Controllers\SanPhamController::class, 'updateSanPham']);


        Route::post('/search', [\App\Http\Controllers\SanPhamController::class, 'search']);
    });

    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/index', [\App\Http\Controllers\KhoHangController::class, 'index']);

        Route::get('/add/{id}', [\App\Http\Controllers\KhoHangController::class, 'store']);
        Route::get('/loadData', [\App\Http\Controllers\KhoHangController::class, 'loadData']);

        Route::get('/delete/{id}', [\App\Http\Controllers\KhoHangController::class, 'destroy']);
        Route::post('/update', [\App\Http\Controllers\KhoHangController::class, 'update']);

        Route::get('/create', [\App\Http\Controllers\KhoHangController::class, 'create']);
    });

});
Route::get('/agent/register', [\App\Http\Controllers\AgentController::class, 'register']);
Route::post('/agent/register', [\App\Http\Controllers\AgentController::class, 'registerAction']);
Route::get('/agent/login', [\App\Http\Controllers\AgentController::class, 'login']);
Route::post('/agent/login', [\App\Http\Controllers\AgentController::class, 'loginAction']);
Route::get('/active/{hash}', [\App\Http\Controllers\AgentController::class, 'active']);
Route::get('/agent/logout', [\App\Http\Controllers\AgentController::class, 'logout']);

Route::get('/agent/myaccount', [\App\Http\Controllers\AgentController::class, 'myaccount']);

Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);
Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageController::class, 'viewSanPham']);
Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageController::class, 'viewDanhMuc']);

Route::get('/cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
Route::post('/add-to-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCart']);
Route::get('/cart/data', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
Route::post('/add-to-cart-update', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCartUpdate']);
Route::post('/remove-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'removeCart']);
Route::get('/bill-done', [\App\Http\Controllers\DonHangController::class, 'billDone']);
Route::get('/create-bill', [\App\Http\Controllers\DonHangController::class, 'store']);
Route::post('/subscribe', [\App\Http\Controllers\SubscribeEmailController::class, 'create']);

