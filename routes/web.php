<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminProductController;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminStatsController;
use App\Http\Controllers\AdminAccountController;


Route::get('/test', [CartController::class, "test"]);

Route::get('/', function () {
    return redirect('/ClientIndex');
});


// ADMIN MIDDLEWARE
Route::get('/logon', [AdminController::class, "logon"]);
Route::post('/logon', [AdminController::class, "postLogon"]);
Route::get('/signout', [AdminController::class, "signOut"]);

Route::prefix('admin')->middleware('admin')->group(function(){
// ADMIN
    Route::get('/', [AdminIndexController::class, "adminIndex"]);

// ADMIN BRAND
    Route::get('/brand-list', [AdminBrandController::class, "getAll"]);
    Route::get('/brand-delete/{id}', [AdminBrandController::class, "delete"]);
    Route::get('/brand-add', [AdminBrandController::class, "add"]);
    Route::post('/brand-save', [AdminBrandController::class, "save"]);
    Route::get('/brand-edit/{id}', [AdminBrandController::class, "edit"]);
    Route::post("/brand-update/{id}", [AdminBrandController::class, "update"]);
    Route::get("/brand-search", [AdminBrandController::class, "brandSearch"]);

// ADMIN PRODUCT
    Route::get('/product-list', [AdminProductController::class, "getAll"]);
    Route::get('/product-delete/{id}', [AdminProductController::class, "delete"]);
    Route::get('/product-add', [AdminProductController::class, "add"]);
    Route::post('/product-save', [AdminProductController::class, "save"]);
    Route::get('/product-edit/{id}', [AdminProductController::class, "edit"]);
    Route::post("/product-update/{id}", [AdminProductController::class, "update"]);
    Route::get('/product-details/{id}', [AdminProductController::class, "details"]);
    Route::get("/product-search", [AdminProductController::class, "productSearch"]);
    Route::post('/product-variant/{id}', [AdminProductController::class, "variants"]);
    Route::get('/product-variant-add/{id}', [AdminProductController::class, "variantAdd"]);
    Route::post('/product-variant-save/{id}', [AdminProductController::class, "variantSave"]);
    Route::get('/product-variant-delete/{id}', [AdminProductController::class, "variantDelete"]);
    Route::get('/product-variant-edit/{id}', [AdminProductController::class, "variantEdit"]);
    Route::post("/product-variant-update/{id}", [AdminProductController::class, "variantUpdate"]);
    Route::post('/product-images/{id}', [AdminProductController::class, "images"]);
    Route::get('/product-image-delete/{id}', [AdminProductController::class, "imageDelete"]);
    Route::get('/product-image-add/{id}', [AdminProductController::class, "imageAdd"]);
    Route::post('/product-image-save/{id}', [AdminProductController::class, "imageSave"]);

// ADMIN ORDER
    Route::get('/order-list', [AdminOrderController::class, "getAll"])->name('admin.orders.list');
    Route::post('/order-update-status/{id}', [AdminOrderController::class, "updateStatus"]);
    Route::get('/order-details/{id}', [AdminOrderController::class, "orderDetails"]);
    Route::get("/order-search", [AdminOrderController::class, "orderSearch"])->name('admin.order.search');

// ADMIN STATS
    Route::get('/stats', [AdminStatsController::class, "statistics"]);

// ADMIN ACCOUNT MANAGEMENT
    Route::get('/account-list', [AdminAccountController::class, "getAll"]);

});


// CLIENT CART & ORDERS MIDDLEWARE
Route::get('/cart', [CartController::class, "cart"])->name('cart');

Route::middleware(['cart'])->group(function () {

Route::post('/add-to-cart', [CartController::class, "addToCart"])->name('addToCart');
Route::post('/cartRemove', [CartController::class, "cartRemove"])->name('cart.remove');
Route::get('/cartRemoveAll', [CartController::class, "cartRemoveAll"]);
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::get('/checkout', [CartController::class, "checkout"]);
Route::post('/cart/checkout', [CartController::class, "cartCheckout"]);

Route::get('/order', [ClientIndexController::class, "order"]);
Route::patch('/orders/{id}/update-status', [ClientIndexController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get("/order-details/{id}", [ClientIndexController::class, "orderDetails"]);
Route::match(['GET', 'POST'], '/profile-setting', [ClientIndexController::class, "profileSetting"])->name('profile.setting');

});

// CLIENT LOGIN & REGISTER
Route::get('/login', [UserController::class, "login"]);
Route::post('/login', [UserController::class, "postLogin"]);
Route::get('/register', [UserController::class, "register"]);
Route::post('/register', [UserController::class, "postRegister"]);
Route::get('/logout', [UserController::class, "logout"]);



require  __DIR__. '/web_client.php';



