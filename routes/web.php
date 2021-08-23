<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TournamentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

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

//Gallery Navbar Controller

Route::get('/gallery', [GalleryController::class, 'index']);

//Tournament Navbar Controller

Route::get('/tournament', [TournamentsController::class, 'index']);
Route::get('/teams', [TournamentsController::class, 'team']);
Route::get('/teammate', [TournamentsController::class, 'teammate']);

//Admin Font

// route get show index admin dashboard
Route::get('/admin', [AdminController::class, 'index']);
// route get show dashboard
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
// route post check login account
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
// route get login account
Route::get('/logout', [AdminController::class, 'logout']);
// test CRUD product
Route::prefix('/admin/product')->group(function () {
    Route::get('/list-product', [productController::class, 'showAll']);

    Route::get('/create', [productController::class, 'showCreateProduct']);
    Route::post('/create', [productController::class, 'store'])->middleware('validation_product');

    Route::put('/update', [productController::class, 'update'])->name('product.update')->middleware('validation_product');

    Route::get('/search', [productController::class, 'searchProduct'])->name('product.search');
    Route::get('/getByID', [productController::class, 'getByID'])->name('product.getByID');

    Route::delete('/delete', [productController::class, 'delete'])->name('product.delete');
});


