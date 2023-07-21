<?php

use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('products', ProductController::class);
Route::get('data/{model_name}', [HomeController::class, 'getDataByModelName']);
Route::get('language/{lang}', function ($lang) {
    app()->setLocale($lang);
    Session::put('locale', $lang);
    return $lang;
});
Route::get('data', [HomeController::class, 'getDataByModels']);
Route::prefix('admin')->middleware(['auth:sanctum'])->group(function () {
//    Route::middleware('role:admin')->group(function () {
//        Route::post('products', [Admin\ProductController::class, 'store']);
//        Route::post('products/{Category}/Products', [Admin\ProductController::class, 'store']);
//    });
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user-products', [UserController::class, 'products']);
});

Route::post('login', LoginController::class);
