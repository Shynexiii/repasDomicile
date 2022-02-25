<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login_page');
    });
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login_page');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resources([
        'users' => App\Http\Controllers\Admin\UserController::class,
        'plats' => App\Http\Controllers\Admin\PlatController::class,
    ]);
});

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.index');

Route::get('cart', [App\Http\Controllers\Front\CartContoller::class, 'index'])->name('cart.index');
Route::put('cart/{plat}', [App\Http\Controllers\Front\CartContoller::class, 'store'])->name('cart.add');
Route::patch('cart/{rowId}', [App\Http\Controllers\Front\CartContoller::class, 'update'])->name('cart.update');
Route::delete('cart/{rowId}', [App\Http\Controllers\Front\CartContoller::class, 'destroy'])->name('cart.destroy');
Route::delete('cart', [App\Http\Controllers\Front\CartContoller::class, 'destroyAll'])->name('cart.destroyAll');

Route::get('checkout', [App\Http\Controllers\Admin\PaiementContoller::class, 'checkout'])->name('checkout');
Route::get('checkout/success', [App\Http\Controllers\Admin\PaiementContoller::class, 'success'])->name('checkout.success');
