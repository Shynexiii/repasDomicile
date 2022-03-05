<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login_page');
    });
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login_page');
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resources([
            'users' => App\Http\Controllers\Admin\UserController::class,
            'plats' => App\Http\Controllers\Admin\PlatController::class,
            'commandes' => App\Http\Controllers\Admin\CommandeContoller::class,
        ]);
    });
});

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.index');

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Front\CartContoller::class, 'index'])->name('cart.index');
    Route::put('cart/{plat}', [App\Http\Controllers\Front\CartContoller::class, 'store'])->name('cart.add');
    Route::put('cart/wishlist/{plat}', [App\Http\Controllers\Front\CartContoller::class, 'index'])->name('cart.wishlist');
    Route::patch('cart/{rowId}', [App\Http\Controllers\Front\CartContoller::class, 'update'])->name('cart.update');
    Route::delete('cart/{rowId}', [App\Http\Controllers\Front\CartContoller::class, 'destroy'])->name('cart.destroy');
    Route::delete('cart', [App\Http\Controllers\Front\CartContoller::class, 'destroyAll'])->name('cart.destroyAll');
    Route::post('checkout', [App\Http\Controllers\Admin\PaiementContoller::class, 'checkout'])->name('checkout');
    Route::get('checkout/success', [App\Http\Controllers\Admin\PaiementContoller::class, 'success'])->name('checkout.success');

    Route::get('profile', [App\Http\Controllers\Front\UserController::class, 'index'])->name('user.profile');
    Route::post('profile/{user}', [App\Http\Controllers\Front\UserController::class, 'update'])->name('user.update');
    Route::post('profile/updatePassword/{user}', [App\Http\Controllers\Front\UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::post('profile/update_adresse/{user}', [App\Http\Controllers\Front\UserController::class, 'update_adresse'])->name('user.update_adresse');

    Route::get('commandes', [App\Http\Controllers\Front\CommandeController::class, 'index'])->name('user.commande_history');
    Route::get('commandes_detail/{commande}', [App\Http\Controllers\Front\CommandeController::class, 'show'])->name('user.commande_detail');
    Route::get('preferences', [App\Http\Controllers\Front\PreferenceController::class, 'index'])->name('preference.index');
    Route::post('preferences/{plat}', [App\Http\Controllers\Front\PreferenceController::class, 'store'])->name('preference.store');
    Route::delete('preferences/{plat}', [App\Http\Controllers\Front\PreferenceController::class, 'destroy'])->name('preference.delete');
});
