<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AuthController;

Route::get('/shop', [ClientIndexController::class, "shop"]);
Route::get('/shop/{status}', [ClientIndexController::class, "filter"]);
Route::get('/ClientIndex', [ClientIndexController::class, "clientIndex"]);
Route::get('/contact', [ClientIndexController::class, "contact"]);
Route::get('/about-us', [ClientIndexController::class, "aboutUs"]);
Route::get('/feedback', [ClientIndexController::class, "feedBack"]);
Route::get('/search', [ClientIndexController::class, "search"]);
Route::get("/product-details/{id}", [ClientIndexController::class, "productDetails"]);




