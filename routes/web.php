<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('first.index');
});
Route::post('/checklogin',[LoginController::class,'checklogin']);
Route::get('/register',[LoginController::class,'register']);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/dashboard',[LoginController::class,'dashboard']);


Route::resources(['products'=> ProductController::class,
'users'=> UserController::class,
'orders'=> OrderController::class,
'employees'=> EmployeeController::class
]);
 Route::post('/myaction',[OrderController::class,'myaction'])->name('myaction');
 Route::get('/customerorders',[OrderController::class,'myorder']);