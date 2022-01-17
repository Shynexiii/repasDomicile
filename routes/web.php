<?php

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::resources([
    'categories' => CategorieController::class,
    'products' => ProductController::class,
    'providers' => ProviderController::class,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
