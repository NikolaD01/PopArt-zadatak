<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;

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

// Categories routes
Route::get('/categories', [CategoryController::class, 'viewPage']);
Route::post('/create-category', [CategoryController::class, 'store']);
Route::delete('/categories/{category}', [CategoryController::class, 'delete']);


// Locations routes

Route::get('/locations', [LocationController::class, 'viewPage']);
Route::post('/create-location', [LocationController::class, 'storeLocation']);
Route::delete('/locations/{location}', [LocationController::class, 'delete']);


// Admin Routes

Route::get('/admins-only', [UserController::class, 'adminPage']);
Route::delete('/delete/{user}', [UserController::class, 'deleteUser']);
Route::get('/edit-user/{user}/edit', [UserController::class, 'viewUser']);
Route::put('/edit-user/{user}', [UserController::class, 'update']);

// User Routes
Route::get('/', [UserController::class, 'showCorrectHomepage'])->name('login');
Route::get('/register', function () { return view('register'); });

Route::post('/register-user', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Product routes

Route::get('/create-product', [ProductController::class, 'showCreateForm'])->middleware('auth');
Route::post('/create-product', [ProductController::class, 'storeProduct'])->middleware('auth');
Route::get('/product/{product}', [ProductController::class, 'viewSingleProduct']);
// only let this if user can delete specific post // middleware
Route::delete('/product/{product}', [ProductController::class, 'delete'])->middleware('can:delete,product');
Route::get('/product/{product}/edit',[ProductController::class, 'showEditForm'])->middleware('can:update,product');
Route::put('/product/{product}', [ProductController::class, 'update'])->middleware('can:update,product');
// Profile routes

Route::get('/profile/{user:username}', [UserController::class, 'profile']);