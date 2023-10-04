<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\ContactControlle;
use App\Http\Controllers\Admin\IntroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\user\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadFileController;

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

Route::get('user/login', [LoginController::class, 'index'])->name('login');
Route::post('user/login', [LoginController::class, 'login']);
Route::get('user/logout', [MainController::class, 'logout']);


Route::get('dang-nhap.html', [AccountController::class, 'login']);

Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('main', [MainController::class, 'index'])->name('admin');
        Route::post('upload-file', [UploadFileController::class, 'upload']);

        Route::prefix('menu')->group(function() {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{id}', [MenuController::class, 'show']);
            Route::post('edit/{id}', [MenuController::class, 'update']);
            Route::DELETE('remove', [MenuController::class, 'destroy']);
        });

        Route::prefix('post')->group(function() {
            Route::get('add', [PostController::class, 'create']);
            Route::post('add', [PostController::class, 'store']);
            Route::get('list', [PostController::class, 'index']);
            Route::get('edit/{id}', [PostController::class, 'edit']);
            Route::post('edit/{id}', [PostController::class, 'update']);
            Route::DELETE('remove', [PostController::class, 'destroy']);
        });

        Route::prefix('intro')->group(function() {
            Route::get('add', [IntroController::class, 'create']);
            Route::post('add', [IntroController::class, 'store']);
            Route::get('list', [IntroController::class, 'index']);
            Route::get('edit/{id}', [IntroController::class, 'edit']);
            Route::post('edit/{id}', [IntroController::class, 'update']);
            Route::DELETE('remove', [IntroController::class, 'destroy']);
        });

        Route::prefix('contact')->group(function() {
            Route::get('add', [ContactControlle::class, 'create']);
            Route::post('add', [ContactControlle::class, 'store']);
            Route::get('list', [ContactControlle::class, 'index']);
            Route::get('edit/{id}', [ContactControlle::class, 'edit']);
            Route::post('edit/{id}', [ContactControlle::class, 'update']);
            Route::DELETE('remove', [ContactControlle::class, 'destroy']);
        });
       
        Route::prefix('cart')->group(function() {
            Route::get('list', [CartController::class, 'index']);
            Route::get('view/{id}', [CartController::class, 'cart']);
            Route::DELETE('remove', [CartController::class, 'destroy']);
        });
        // 
        Route::prefix('product')->group(function() {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::post('slug', [ProductController::class, 'slug']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{id}', [ProductController::class, 'show']);
            Route::post('edit/{id}', [ProductController::class, 'update']);
            Route::DELETE('remove', [ProductController::class, 'destroy']);
        });
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::get('san-pham/{slug}.html', [App\Http\Controllers\MainController::class, 'detall']);
Route::get('gioi-thieu.html', [App\Http\Controllers\MainController::class, 'intro']);

Route::get('tin-tuc.html', [App\Http\Controllers\PostController::class, 'index']);

Route::get('lien-he.html', [App\Http\Controllers\ContactController::class, 'index']);

Route::get('san-pham.html', [App\Http\Controllers\ProductController::class, 'product']);
Route::post('load-product-list', [App\Http\Controllers\ProductController::class, 'loadProductList']);
Route::post('load-detall', [App\Http\Controllers\ProductController::class, 'loadDetall']);
Route::get('danh-sach/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'productList']);
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'productListMenu']);

Route::post('cart-add', [App\Http\Controllers\CartContoller::class, 'addCart']);
Route::get('gio-hang.html', [App\Http\Controllers\CartContoller::class, 'index']);
Route::post('cart-delete', [App\Http\Controllers\CartContoller::class, 'delete']);
Route::get('dat-hang.html', [App\Http\Controllers\CartContoller::class, 'checkout']);
Route::post('cart/store', [App\Http\Controllers\CartContoller::class, 'store']);