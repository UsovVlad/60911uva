<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
