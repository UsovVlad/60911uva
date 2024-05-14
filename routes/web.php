<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return view ('hello', ['title' => 'Hello world!']);
    //return view('welcome');
});

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/item', [ItemController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/item/create', [ItemController::class, 'create']);
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/edit/{id}', [ItemController::class, 'edit']);
Route::post('/item/update/{id}', [ItemController::class, 'update']);
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy']);
