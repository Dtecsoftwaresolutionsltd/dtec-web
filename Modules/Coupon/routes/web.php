<?php

use Illuminate\Support\Facades\Route;
use Modules\Coupon\App\Http\Controllers\CouponController;

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


Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']],function (){
    Route::resource('coupon', CouponController::class)->names('coupon');
    Route::get('/coupon-history-list', [CouponController::class, 'coupon_history_list'])->name('coupon-history-list');
});
Route::group(['as'=> 'user.', 'prefix' => 'user'],function (){
    Route::post('/apply-coupon', [CouponController::class, 'apply_coupon'])->name('apply-coupon');
});
