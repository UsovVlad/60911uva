<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function() {
    return view ('hello', ['title' => 'Hello world!']);
    //return view('welcome');
});
//Route::get('/category', [CategoryController::class, 'index']);
//Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/item', [ItemController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/item/create', [ItemController::class, 'create'])->middleware('auth');
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->middleware('auth');
Route::post('/item/update/{id}', [ItemController::class, 'update'])->middleware('auth');
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->middleware('auth');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/{itemId}', [CartController::class, 'addItem'])->name('cart.add');
    Route::delete('/cart/{itemId}', [CartController::class, 'removeItem'])->name('cart.remove');
});

