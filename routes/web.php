<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    //return(Auth::user()->email);
    // Auth::logout();

    // session()->invalidate();

    // session()->regenerateToken();

    // if(Auth::user()->email){
    //     return 'loggedin';
    // }else{
    //     return 'logged out';
    // }
    //return "okk";
    return view('admin.login');
});
Route::post('/checklogin',[LoginController::class,'checklogin']);
Route::get('/success',[LoginController::class,'successlogin']);