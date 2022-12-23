<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ControllerCategory;
use App\Http\Controllers\Controllerproduct;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\GetAllDataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'product',
        'middleware' => 'auth:api',
    ],
    function () {
        Route::resource('product', Controllerproduct::class);
    }
);

Route::group(
    [
        'prefix' => 'category',
        'middleware' => 'auth:api'
    ],
    function () {
        Route::resource('category', ControllerCategory::class);
    }
);
Route::group(
    [
        'prefix' => 'content',
        'middleware' => 'auth:api'
    ],
    function () {
        Route::resource('content', ContentController::class);
    }
);
Route::group(
    [
        'prefix' => 'auth',
    ],
    function () {
        Route::post('register', RegisterController::class);
        Route::post('login', LoginController::class);
        Route::get('alldata', GetAllDataController::class);
    }
);
// Route::middleware('auth:api')->get('/details', DetailsController::class);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('detalis', DetailsController::class);
    // Route::get('detalis', ControllerCategory::class);
    Route::post('logout', LogoutController::class);
});
