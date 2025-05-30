<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/', function(){
    return "Hello World";
});


Route::prefix('auth')->group(function(){
    Route::post('/login', AuthController::class . '@login')->name('login');
    Route::post('/register', AuthController::class . '@register')->name('register');
    Route::post('/logout', AuthController::class . '@logout')->name('logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::apiResource('products', ProductController::class);

    Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
    Route::post('/products/{product}/sell', [ProductController::class, 'sell'])->name('products.sell');

});


