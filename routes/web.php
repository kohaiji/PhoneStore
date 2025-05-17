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
    Route::get("/brand-search", [AdminBrandController::class, "categorySearch"]);

// ADMIN PRODUCT
    Route::get('/product-list', [AdminProductController::class, "getAll"]);
    Route::get('/product-delete/{id}', [AdminProductController::class, "delete"]);
    Route::get('/product-add', [AdminProductController::class, "add"]);
    Route::post('/product-save', [AdminProductController::class, "save"]);
    Route::get('/product-edit/{id}', [AdminProductController::class, "edit"]);
    Route::post("/product-update/{id}", [AdminProductController::class, "update"]);
    Route::get('/product-details/{id}', [AdminProductController::class, "details"]);
    Route::get("/product-search", [AdminProductController::class, "productSearch"]);

// ADMIN ORDER
    Route::get('/order-list', [AdminOrderController::class, "getAll"]);
    Route::get('/order-list/{status}', [AdminOrderController::class, "filter"]);
    Route::get('/order-update-status/{id}/{status}', [AdminOrderController::class, "ordersUpdateStatus"]);
    Route::get('/order-details/{id}', [AdminOrderController::class, "orderDetails"]);

// ADMIN STATS
    Route::get('/stats', [AdminStatsController::class, "statistics"]);

// ADMIN ACCOUNT MANAGEMENT
    Route::get('/account-list', [AdminAccountController::class, "getAll"]);

});


// CLIENT CART & ORDERS MIDDLEWARE
Route::get('/cart', [CartController::class, "cart"])->name('cart');

Route::middleware(['cart'])->group(function () {

Route::get('/add-to-cart/{id}/{quantity}', [CartController::class, "addToCart"])->name('addToCart');
Route::get('/cartRemove/{id}/{quantity}', [CartController::class, "cartRemove"]);
Route::get('/cartRemoveAll', [CartController::class, "cartRemoveAll"]);
Route::get('/cart/update/{type}/{id}/{quantity}', [CartController::class, "cartUpdate"]);
Route::get('/checkout', [CartController::class, "checkout"]);
Route::post('/cart/checkout', [CartController::class, "cartCheckout"]);

Route::get('/order', [ClientIndexController::class, "order"]);
Route::get('/order-update-status/{id}/{status}', [ClientIndexController::class, "ordersUpdateStatus"]);
Route::get("/order-details/{id}/{id2}", [ClientIndexController::class, "orderDetails"]);

});

// CLIENT LOGIN & REGISTER
Route::get('/login', [UserController::class, "login"]);
Route::post('/login', [UserController::class, "postLogin"]);
Route::get('/register', [UserController::class, "register"]);
Route::post('/register', [UserController::class, "postRegister"]);
Route::get('/logout', [UserController::class, "logout"]);



require  __DIR__. '/web_client.php';



