<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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

Route::prefix('admin')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('create', [ProductController::class, 'store'])->name('product.store');
        Route::get('{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('{id}/edit', [ProductController::class, 'update'])->name('product.update');
        Route::get('{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('search', [ProductController::class, 'search'])->name('product.search');
    });
});

Route::prefix('')->group(function () {
    Route::get('/', [ShopController::class, 'home'])->name('shop.home');
//    Route::get('master', [ShopController::class, 'master'])->name('shop.master');
/*    Route::get('/detail', [ShopController::class, 'detail'])->name('shop.detail');*/
    Route::get('list', [ShopController::class, 'list'])->name('shop.list');
    Route::get('search', [ShopController::class, 'search'])->name('shop.search');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('{idProduct}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('{idProduct}/delete-to-cart', [CartController::class, 'deleteToCart'])->name('cart.deleteToCart');
    Route::get('checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
});
Route::get('{id}/detail',[ShopController::class,'detail'])->name('detail');
Auth::routes();

Route::get('/home', [ProductController::class, 'showLogin'])->name('home');

