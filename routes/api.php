<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api-token')->group(function () {
    Route::post('/register', [\App\Http\Controllers\api\v1\UserController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\api\v1\UserController::class, 'login']);
    Route::post('/forget_password', [\App\Http\Controllers\api\v1\UserController::class, 'forgetPassword']);
    Route::post('/reset_password', [\App\Http\Controllers\api\v1\UserController::class, 'resetPassword']);

    Route::get('/services_categories', [\App\Http\Controllers\api\v1\ServiceCategoryController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function (){

        Route::get('my_services',[\App\Http\Controllers\Api\V1\serviceController::class,'index']);
    });

});
