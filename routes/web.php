<?php


use App\Http\Controllers\Admin\SoclaiController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\ContactControlle;
use App\Http\Controllers\Admin\IntroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\user\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSliderController;
use App\Http\Controllers\Admin\UploadFileController;
use App\Http\Controllers\Admin\user\UserController;
use App\Http\Controllers\RegisterController;

// login to account admin
Route::get('user/login', [LoginController::class, 'index'])->name('login');
Route::post('user/login', [LoginController::class, 'login']);
Route::get('user/logout', [MainController::class, 'logout']);

// login to account client
Route::get('dang-nhap.html', [App\Http\Controllers\LoginController::class, 'index'])->name('accLogin');
Route::post('user/acc/login', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('dang-xuat.logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('accLogout');

Route::get('tai-khoan.html', [AccountController::class, 'account'])->name('account');
Route::get('don-hang.html', [AccountController::class, 'order']);
Route::get('doi-mat-khau.html', [AccountController::class, 'pass']);
Route::post('user/acc/change', [AccountController::class, 'chang']);
Route::get('dia-chi.html', [AccountController::class, 'address']);

//
Route::get('dang-ky.html', [RegisterController::class, 'index']);
Route::post('user/acc/register', [RegisterController::class, 'store']);

// PATH ADMIN AND PATH MANAGE
Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('admin');

        #UPLOAD FILE MAIN
        Route::post('upload-file', [UploadFileController::class, 'upload']);

        #MENU
        Route::prefix('menu')->group(function() {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{id}', [MenuController::class, 'show']);
            Route::post('edit/{id}', [MenuController::class, 'update']);
            Route::DELETE('remove', [MenuController::class, 'destroy']);
        });

        #Social
        Route::prefix('soclai')->group(function() {
            Route::get('add', [SoclaiController::class, 'create']);
            Route::post('add', [SoclaiController::class, 'store']);
            Route::get('list', [SoclaiController::class, 'index']);
            Route::get('edit/{id}', [SoclaiController::class, 'edit']);
            Route::post('edit/{id}', [SoclaiController::class, 'update']);
            Route::DELETE('remove', [SoclaiController::class, 'destroy']);
        });

        #Policy
        Route::prefix('policy')->group(function() {
            Route::get('add', [PolicyController::class, 'create']);
            Route::post('add', [PolicyController::class, 'store']);
            Route::get('list', [PolicyController::class, 'index']);
            Route::get('edit/{id}', [PolicyController::class, 'edit']);
            Route::post('edit/{id}', [PolicyController::class, 'update']);
            Route::DELETE('remove', [PolicyController::class, 'destroy']);
        });

        #MENU
        Route::prefix('blog')->group(function() {
            Route::get('add', [BlogController::class, 'create']);
            Route::post('add', [BlogController::class, 'store']);
            Route::get('list', [BlogController::class, 'index']);
            Route::get('edit/{blog}', [BlogController::class, 'show']);
            Route::post('edit/{blog}', [BlogController::class, 'update']);
            Route::DELETE('remove', [BlogController::class, 'destroy']);
        });

        #Cart
        Route::prefix('cart')->group(function() {
            Route::get('list', [CartController::class, 'index']);
            Route::get('view/{id}', [CartController::class, 'cart']);
            Route::DELETE('remove', [CartController::class, 'destroy']);
        });

        #Account
        Route::prefix('account')->group(function() {
            Route::get('contomer', [UserController::class, 'contomer']);
            Route::get('chang/{user}', [UserController::class, 'chang']);
            Route::post('chang/{user}', [UserController::class, 'changStore']);
            Route::get('password/{user}', [UserController::class, 'password']);
            Route::post('password/{user}', [UserController::class, 'passwordStore']);
        });

        #PRODUCT
        Route::prefix('product')->group(function() {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::post('slug', [ProductController::class, 'slug']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{id}', [ProductController::class, 'show']);
            Route::post('edit/{id}', [ProductController::class, 'update']);
            Route::DELETE('remove', [ProductController::class, 'destroy']);

            #Slider product
            Route::prefix('slider')->group(function() {
                Route::get('add/{id}', [ProductSliderController::class, 'create']);
                Route::post('add/{id}', [ProductSliderController::class, 'store']);
                Route::get('list/{id}', [ProductSliderController::class, 'index']);
                Route::get('edit/{id}', [ProductSliderController::class, 'show']);
                Route::post('edit/{id}', [ProductSliderController::class, 'update']);
                Route::DELETE('remove', [ProductSliderController::class, 'destroy']);
            });
        });

        #Account manage
        Route::middleware(['manage'])->group(function() {
            #POST
            Route::prefix('post')->group(function() {
                Route::get('add', [PostController::class, 'create']);
                Route::post('add', [PostController::class, 'store']);
                Route::get('list', [PostController::class, 'index']);
                Route::get('edit/{id}', [PostController::class, 'edit']);
                Route::post('edit/{id}', [PostController::class, 'update']);
                Route::DELETE('remove', [PostController::class, 'destroy']);
            });

            #Manage Account
            Route::prefix('account')->group(function() {
                Route::get('list', [UserController::class, 'index']);
                Route::get('add', [UserController::class, 'create']);
                Route::post('add', [UserController::class, 'store']);
                Route::get('edit/{id}', [UserController::class, 'edit']);
                Route::post('edit/{id}', [UserController::class, 'update']);
                Route::DELETE('remove', [UserController::class, 'destroy']);
            });

            #Intro
            Route::prefix('intro')->group(function() {
                Route::get('add', [IntroController::class, 'create']);
                Route::post('add', [IntroController::class, 'store']);
                Route::get('list', [IntroController::class, 'index']);
                Route::get('edit/{id}', [IntroController::class, 'edit']);
                Route::post('edit/{id}', [IntroController::class, 'update']);
                Route::DELETE('remove', [IntroController::class, 'destroy']);
            });

            #Contact
            Route::prefix('contact')->group(function() {
                Route::get('add', [ContactControlle::class, 'create']);
                Route::post('add', [ContactControlle::class, 'store']);
                Route::get('list', [ContactControlle::class, 'index']);
                Route::get('edit/{id}', [ContactControlle::class, 'edit']);
                Route::post('edit/{id}', [ContactControlle::class, 'update']);
                Route::DELETE('remove', [ContactControlle::class, 'destroy']);
            });
        });
    });
});

// tranh chủ, trang giới thiệu, trang tìm kiếm
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('load-menu-first', [App\Http\Controllers\MainController::class, 'loadMenuFirst']);
Route::get('san-pham/{slug}.html', [App\Http\Controllers\MainController::class, 'detall']);
Route::get('gioi-thieu.html', [App\Http\Controllers\MainController::class, 'intro']);
Route::get('search', [App\Http\Controllers\MainController::class, 'search']);

// trang tin tức
Route::get('tin-tuc/{slug}.html', [App\Http\Controllers\MainController::class, 'categry']);
Route::get('tin-tuc.html', [App\Http\Controllers\PostController::class, 'index']);
Route::get('lien-he.html', [App\Http\Controllers\ContactController::class, 'index']);

//
Route::get('blog', [App\Http\Controllers\BlogController::class, 'index']);
Route::get('blog/{slug}/{id}', [App\Http\Controllers\BlogController::class, 'detail']);

// public trang sản phẩm
Route::get('san-pham.html', [App\Http\Controllers\ProductController::class, 'product']);
Route::post('load-product-list', [App\Http\Controllers\ProductController::class, 'loadProductList']);
Route::post('product-select', [App\Http\Controllers\ProductController::class, 'productSelect']);
Route::post('load-detall', [App\Http\Controllers\ProductController::class, 'loadDetall']);
Route::get('danh-sach/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'productList']);
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'productListMenu']);

// phần giỏ hàng
Route::post('cart-add', [App\Http\Controllers\CartContoller::class, 'addCart']);
Route::get('gio-hang.html', [App\Http\Controllers\CartContoller::class, 'index']);
Route::post('cart-delete', [App\Http\Controllers\CartContoller::class, 'delete']);
Route::post('cart-update-qty', [App\Http\Controllers\CartContoller::class, 'cartUpdateQty']);
Route::get('dat-hang.html', [App\Http\Controllers\CartContoller::class, 'checkout']);
Route::post('cart/store', [App\Http\Controllers\CartContoller::class, 'store']);
Route::post('cart/qty', [App\Http\Controllers\CartContoller::class, 'countQty']);
Route::post('cart/item', [App\Http\Controllers\CartContoller::class, 'itemCart']);