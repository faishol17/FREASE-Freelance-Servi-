<?php

use Illuminate\Support\Facades\Route;

// front ( landing )
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\MidtransController;


// member ( dashboard )
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Admin\Admincontroller;



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

Route::get('detail_booking/{id}', [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
Route::post('proses-pembayaran', [MidtransController::class, 'prosesPayment'])->name('prosesPayment');
Route::post('payment_midtrans', [MidtransController::class, 'payment_midtrans'])->name('payment_midtrans');

Route::get('booking/{id}', [LandingController::class, 'booking'])->name('booking.landing');
Route::get('detail/{id}', [LandingController::class, 'detail'])->name('detail.landing');
Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
Route::get('tentang', [LandingController::class, 'tentang'])->name('tentang.landing');
Route::get('hubungi', [LandingController::class, 'hubungi'])->name('hubungi.landing');
Route::resource('/', LandingController::class);
//admin
//admin
route::group(['prefix' => 'admin','middleware' => ['auth', 'Authadmin:admin']], function () 
{
    Route::get('/', [Admincontroller::class, 'index'])->name('admin');
    Route::post('/simpan-konfirmasi', [Admincontroller::class, 'simpankonfirmasi']);


});
Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum', 'verified']], function() {

    // dashboard
    Route::resource('dashboard', MemberController::class);

    // service
    Route::resource('service', ServiceController::class);
    Route::post('proses-Hapus', [ServiceController::class,'prosesHapus'])->name('prosesHapus');

    

    // request
    Route::get('approve_request/{id}', [RequestController::class, 'approve'])->name('approve.request');
    Route::resource('request', RequestController::class);

    // my order
    Route::get('accept/order/{id}', [MyOrderController::class, 'accepted'])->name('accept.order');
    Route::get('reject/order/{id}', [MyOrderController::class, 'rejected'])->name('reject.order');
    Route::resource('order', MyOrderController::class);

    // profile
    Route::get('delete_photo', [ProfileController::class, 'delete'])->name('delete.photo.profile');
    Route::resource('profile', ProfileController::class);


});


