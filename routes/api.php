<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function(){
//
});

Route::get('/', function(){
    return "Hello World";
});

Route::post('/login', AuthController::class . '@login')->name('login');
Route::post('/register', AuthController::class . '@register')->name('register');


Route::get('/products', ProductController::class . '@index')->name('products.index');