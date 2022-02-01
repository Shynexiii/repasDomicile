<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
return view('auth.login');
});*/
Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resources([
        'users' => App\Http\Controllers\Admin\UserController::class,
        'plats' => App\Http\Controllers\Admin\PlatController::class,
    ]);
});

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.home');
