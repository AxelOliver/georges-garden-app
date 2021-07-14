<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

//Route::resource('products', ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'is_admin:1', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('products/showImage/{product}', [ProductController::class, 'showImage'])->name('products.showImage');
        Route::match(['put', 'patch'], 'products/showImage/{product}', [ProductController::class, 'updateImage'])->name('products.updateImage');
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
    });
});
