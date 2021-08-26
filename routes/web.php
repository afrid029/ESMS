<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('first.index');
});
Route::post('/checklogin',[LoginController::class,'checklogin']);
Route::get('/register',[LoginController::class,'register']);
Route::get('/logout',[LoginController::class,'logout']);


Route::resources(['products'=> ProductController::class,
'users'=> UserController::class,
'orders'=> OrderController::class
]);

//Route::get('/placeorder/{product}',[ProductController::class,'showToOrder'])->name('products.order');
//Route::get('/showmyorders',[OrderController::class,'showEmployeeOrder'])->name('myorder');
