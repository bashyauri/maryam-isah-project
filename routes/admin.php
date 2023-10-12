<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    // Admin dashboard route
    Route::get('/', function () {
        return redirect('admin.dashboard');
    });

    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login']);
    // Other admin routes...
    Route::group(['middleware' => 'admin.auth'], function () {
        // Admin routes
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


        Route::get('/logout', [AdminLogoutController::class, 'logout']);
    });
});
