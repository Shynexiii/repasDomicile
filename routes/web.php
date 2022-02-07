<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login_page');
    });
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name(('login_page'));
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resources([
        'users' => App\Http\Controllers\Admin\UserController::class,
        'plats' => App\Http\Controllers\Admin\PlatController::class,
    ]);
});

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.home');
