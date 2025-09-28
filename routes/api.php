<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\ItemControllerApi;
use App\Http\Controllers\CartControllerApi;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/cart',[CartControllerApi::class, 'index']);
    Route::get('/cart/{id}', [CartControllerApi::class, 'show']);
    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/logout', [AuthController::class, 'logout']);

});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);

Route::get('/item', [ItemControllerApi::class, 'index']);
Route::get('/item/{id}', [ItemControllerApi::class, 'show']);

//Route::get('/cart', [CartControllerApi::class, 'index']);
//Route::get('/cart/{id}', [CartControllerApi::class, 'show']);
