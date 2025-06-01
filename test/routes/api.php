<?php

use App\Http\Controllers\Apis\Auth\EmailVerficationController;
use App\Http\Controllers\Apis\Auth\LoginController;
use App\Http\Controllers\Apis\Auth\RegisterController;
use App\Http\Controllers\Apis\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| هنا بنسجل مسارات الـ API، بعضها محمي وبعضها مفتوح.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "products"], function () {
    Route::get("/", [ProductController::class, "index"]);
    Route::get("/create/", [ProductController::class, "create"]);
    Route::get("/edit/{id}/", [ProductController::class, "edit"]);
    Route::post("/store/", [ProductController::class, "store"]);
    Route::put("/update/{id}", [ProductController::class, "update"]);
    Route::delete("/destroy/{id}", [ProductController::class, "destroy"]);
});

Route::group(["prefix" => "users"], function () {
    // مسارات التسجيل واللوجين و إرسال وفحص كود التفعيل (غير محمية)
    Route::post("register", RegisterController::class);
    Route::post("login", [LoginController::class, 'login']);
   

    // مسارات الحماية تحتاج توكن (middleware auth:sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        Route::delete("logout", [LoginController::class, 'logout']);
        Route::delete("logout-all", [LoginController::class, 'logoutAll']);
        Route::post("send-code", [EmailVerficationController::class, "sendcode"]);
        Route::post("check-code", [EmailVerficationController::class, "checkcode"]);
    });
});
