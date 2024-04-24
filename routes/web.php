<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AppController::class)->group(function(){
    Route::get('/','index')->name('app.index');
    Route::get('/about-us','about')->name('app.about');
    Route::get('/contact-us','contact')->name('app.contact');    
});
Route::post('/contact-us/sendMail',[mailController::class, 'store'])->name('mail.store');
Route::get('/categoryProducts/{id}',[CategoryController::class, 'index'])->name('app.categoryProducts');






Route::get('/shop',[ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class, 'productDetails'])->name('shop.productDetails');





Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::controller(UserController::class)->group(function(){
        Route::get('/my-account', 'index')->name('user.index');
        Route::get('/my-account/edit/{id}', 'edit')->name('user.edit');
        Route::put('/my-account/update/{id}', 'update')->name('user.update');
        Route::delete('/my-account/delete/{id}', 'delete')->name('user.delete');
        Route::get('/my-account/changepassword/{id}', 'changepassword')->name('user.changepassword');
        Route::put('/my-account/donechangepassword/{id}', 'donechangepassword')->name('user.donechangepassword');
   });



    Route::controller(CartController::class)->group(function(){
        Route::get('/carts', 'index')->name('cart.index');
        Route::post('/carts/store/', 'store')->name('carts.store');
        Route::put('/cart/update', 'update')->name('cart.update');
        Route::delete('/cart/destroy/{id}', 'destroy')->name('cart.destroy');
        Route::delete('/cart/clear', 'clear')->name('cart.clear');
   });

   Route::controller(WishlistController::class)->group(function(){
        Route::get('/wishlist','index')->name('wishlist');
        Route::post('/wishlist/store','store')->name('wishlist.store');
        Route::post('/wishlist/storetocart','storeToCart')->name('wishlist.storeToCart');
        Route::delete('/wishlist/destroy/{id}','destroy')->name('wishlist.destroy');
    });

    Route::controller(LocationController::class)->group(function(){
        Route::get('/location/create','create')->name('location.create');
        Route::post('/location/store','store')->name('location.store');
        Route::put('/location/update/{id}','update')->name('location.update');
        Route::get('/location/edit/{id}','edit')->name('location.edit');
        Route::delete('/location/destroy/{id}','destroy')->name('location.destroy');
    });
});



Route::middleware(['auth', 'auth_admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.index');
});
