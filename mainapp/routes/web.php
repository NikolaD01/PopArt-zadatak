<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [UserController::class, 'showCorrectHomepage'])->name('login');
Route::get('/register', function () { return view('register'); });

Route::post('/register-user', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Product routes

Route::get('/create-product', [ProductController::class, 'showCreateForm'])->middleware('auth');
Route::post('/create-product', [ProductController::class, 'storeProduct'])->middleware('auth');
Route::get('/product/{product}', [ProductController::class, 'viewSingleProduct']);

// Profile routes

Route::get('/profile/{user:username}', [UserController::class, 'profile']);