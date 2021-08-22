<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
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

Route::get('/', [HomeController::class, 'index']);

//Store Navbar Controller

Route::get('/store', [StoreController::class, 'index']);
Route::get('/cart', [StoreController::class, 'cart']);
Route::get('/checkout', [StoreController::class, 'checkout']);
Route::get('/catalog', [StoreController::class, 'catalog']);
Route::get('/product', [StoreController::class, 'product']);
Route::get('/catalogAlt', [StoreController::class, 'catalogAlt']);

//Admin Font

// route get show index admin dashboard
Route::get('/admin', [AdminController::class, 'index']);
// route get show dashboard
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
// route post check login account
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
// route get login account
Route::get('/logout', [AdminController::class, 'logout']);

