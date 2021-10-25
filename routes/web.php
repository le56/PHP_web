<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TournamentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\uploadImageController;
use App\Http\Controllers\screenAndSliderController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/checkout', [StoreController::class, 'checkout'])->middleware("authen");
Route::get('/catalog', [StoreController::class, 'catalog']);
Route::get('product/{id}', [StoreController::class, 'product']);
// handle comment
Route::post('/product/comment', [StoreController::class, 'addComment'])->name('product.comment');

Route::get('/catalogAlt', [StoreController::class, 'catalogAlt']);

//Gallery Navbar Controller

Route::get('/gallery', [GalleryController::class, 'index']);

//Tournament Navbar Controller

Route::get('/tournament', [TournamentsController::class, 'index']);
Route::get('/tournament/{id}', [TournamentsController::class, 'tournament']);
Route::get('/teams', [TournamentsController::class, 'team']);
Route::get('/teammate', [TournamentsController::class, 'teammate']);

//Google PHP

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Facebook PHP

Route::get('auth/facebook', [GoogleController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [GoogleController::class, 'handleFacebookCallback']);

//Github PHP

Route::get('auth/github', [GoogleController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [GoogleController::class, 'handleGithubCallback']);


//Admin Font

// route get show index admin dashboard
Route::get('/admin', [AdminController::class, 'index']);
// route get show dashboard
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
// route post check login account
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
// route get login account
Route::get('/logout', [AdminController::class, 'logout']);
// handle cart 
Route::group(["prefix"=>"/cart","middleware"=>["authen"]],function() {
    Route::get('/', [cartController::class, 'cart']);
    Route::post("/", [cartController::class, 'createOrUpdate'])->name('cart.createOrUpdate');
    Route::delete('/{id}', [cartController::class, 'delete']);
});
//  handle admin product
Route::group(["prefix"=>"/admin/product","middleware"=>["adminAuthen"]],function() {
    Route::get('/list-product', [productController::class, 'showAll']);

    Route::get('/create', [productController::class, 'showCreateProduct']);
    Route::post('/create', [productController::class, 'store'])->middleware('validation_product');

    Route::put('/update', [productController::class, 'update'])->name('product.update')->middleware('validation_product');

    Route::patch('/update_quantity/{id}',[productController::class, 'addQuantity']);

    Route::get('/search', [productController::class, 'searchProduct'])->name('product.search');
    Route::get('/getByID', [productController::class, 'getByID'])->name('product.getByID');

    Route::delete('/delete', [productController::class, 'delete'])->name('product.delete');
});
// handle blog admin 
Route::group(["prefix"=>"/admin/blog","middleware"=>["adminAuthen"]],function() {
    Route::get('/list-blog', [blogController::class, 'showAllListPostBlog']);

    Route::get('/create', [blogController::class, 'showCreateblog']);
    Route::post('/create', [blogController::class, 'createPost'])->middleware('validation_blog');
   
    Route::post('/update/{id}', [blogController::class, 'updateBlog'])->middleware('validation_blog');

    Route::get('/search', [blogController::class, 'searchBlog'])->name('blog.search');
    Route::get('/getByID/{id}', [blogController::class, 'getOnePost']);

    Route::delete('/delete/{id}', [blogController::class, 'deletePost']);
});


// blog user
Route::prefix('/blog')->group(function () {
    Route::get('/',[blogController::class,'showBlog']);
    Route::get('/grid',[blogController::class,'showBlogGrid']);
    Route::get('/{id}',[blogController::class,'showBlogDetail']);
});

// screen 
Route::group(["prefix"=>"/admin/screen","middleware"=>["adminAuthen"]],function() {
    Route::get('/{id}',[screenAndSliderController::class,"showUpdateScreen"]);
    Route::get('/',[screenAndSliderController::class,"showListScreenHome"]);
    Route::put("/{id}",[screenAndSliderController::class,"updateScreen"]);
});
// home slider 
Route::group(["prefix"=>"/admin/home-slider","middleware"=>["adminAuthen"]],function() {
    Route::get('/{id}',[screenAndSliderController::class,"showUpdateHomeSlider"]);
    Route::get('/',[screenAndSliderController::class,"showListHomeSlider"]);
    Route::put("/{id}",[screenAndSliderController::class,"updateHomeSlider"]);
});
// store picture gallery 
Route::group(["prefix"=>"/admin/store-gallery","middleware"=>["adminAuthen"]],function() {
    Route::get('/',[screenAndSliderController::class,"showListStoreGallery"]);
    Route::put('/',[screenAndSliderController::class,"updateStoreGallery"])->name("updateStoreGallery");
});

// upload image routes
//   dropzone
Route::post("/upload", [uploadImageController::class, 'store'])->name('upload');
Route::post("/delete_upload", [uploadImageController::class, 'destroy'])->name('deleteUpload');
// update image product
Route::post("/update_image", [uploadImageController::class, 'updateImageUpload'])->name('update_image');
Route::delete("/deleteMuti", [uploadImageController::class, 'destroyMuti'])->name('product.deleteMuti');
Route::post("/upload_checkEditor", [uploadImageController::class, 'uploadImageCheckEditor'])->name('upload_checkEditor');

// user logout

Route::get("/user-logout", function (){
    Auth::logout();
    return redirect()->back();
});

// paypal route 
Route::post('/paypal',[\App\Http\Controllers\PaypalController::class,'index'])->name('paypal_call')->middleware('authen');
Route::get('/paypal/return',[\App\Http\Controllers\PaypalController::class,'paypalReturn'])->name('paypal_return');
Route::get('/paypal/cancel',[\App\Http\Controllers\PaypalController::class,'paypalCancel'])->name('paypal_cancel');
