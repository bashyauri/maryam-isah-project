<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
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
});