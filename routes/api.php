<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\ItemControllerApi;
use App\Http\Controllers\CartControllerApi;

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
Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);

Route::get('/item', [ItemControllerApi::class, 'index']);
Route::get('/item/{id}', [ItemControllerApi::class, 'show']);

Route::get('cart/', [CartControllerApi::class, 'index']);
Route::get('/cart/{id}', [CartControllerApi::class, 'show']);


