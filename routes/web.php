<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\UmrahPaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
});


Auth::routes();

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home',  'index')->name('home');
    });

    Route::controller(ApplicationController::class)->group(function () {
        // All VendorProduct routes
        Route::get('application/profile',  'index')->name('application-profile');
        Route::post('application/biodata', 'storeBiodata')->name('application-biodata');
    });
    Route::controller(MedicalHistoryController::class)->group(function () {
        Route::get('application/medical',  'index')->name('application.medical-history');
        Route::post('application/add/medical', 'store')->name('application.medical');
    });
    Route::controller(PaymentController::class)->group(function () {
        Route::get('application/payment',  'index')->name('application.payment');
        Route::post('application/payment/invoice',  'generateInvoice')->name('application.invoice');
        Route::get('application/payment/receipt',  'exportReceipt')->name('receipt');
    });
    Route::controller(ComplainController::class)->group(function () {
        Route::get('application/complain',  'index')->name('application.complain');
        Route::post('application/complain',  'store')->name('application.store.complain');
    });
    Route::controller(UmrahPaymentController::class)->group(function () {
        Route::get('application/umrah',  'index')->name('application.umrah');
        Route::post('application/umrah/invoice',  'generateInvoice')->name('umrah.invoice');
    });
});

Route::get('/vendor/login', [VendorController::class, 'login'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);;
Route::get('admin/logout', [AdminLogoutController::class, 'logout']);
