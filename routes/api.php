<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellPageController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/sell', [SellPageController::class, 'index'])->name('sell');
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/product/category', ProductCategoryController::class);
    Route::apiResource('/service/category', ServiceCategoryController::class);
});

Route::apiResource('/product', ProductController::class);
Route::apiResource('/service', ServiceController::class);
