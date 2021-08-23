<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


