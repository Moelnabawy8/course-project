<?php

use App\Http\Controllers\Auth\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// closure ex
// Route::get('profile',function(){
// echo "hello profile";
// });

Route::group(['prefix' => 'Dasboard'], function () {
    Route::group(['prefix' => 'admins'], function () {
        Route::get("profile", [ProfileController::class, "profile"])->name('profile');
        Route::get("login", [LoginController::class, "login"])->name('login');
        Route::get("cart", [CartController::class, "cart"]);
    });
});
