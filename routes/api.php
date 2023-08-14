<?php

use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
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
    Route::apiResource('categories', Admin\CategoryController::class);
    Route::apiResource('colors', Admin\ColorController::class);
    Route::apiResource('sizes', Admin\SizeController::class);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('user-products', [UserController::class, 'products']);
    Route::get('user/info', [UserController::class, 'getInfo']);
    Route::post('user/info', [UserController::class, 'updateInfo']);
    Route::post('user/reset', [AuthController::class, 'resetPassword']);
});

Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);

