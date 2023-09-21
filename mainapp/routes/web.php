<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
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

// Stripe 
Route::get('/', [StripeController::class, 'index']);
Route::post('/checkout', [StripeController::class, 'checkout']);
Route::get('/success', [StripeController::class, 'success']);


//  Cart 
Route::get('/cart', [CartController::class, 'viewPage'])->name('cart');
Route::post('/cart/add/{product}', [CartController::class, 'addProduct']);
Route::delete('/cart/delete/{product}', [CartController::class, 'deleteProduct']);


// Categories routes
Route::get('/categories', [CategoryController::class, 'viewPage']);
Route::post('/create-category', [CategoryController::class, 'store']);
Route::delete('/categories/{category}', [CategoryController::class, 'delete']);
Route::get('/categories/{categoryId}', [CategoryController::class, 'showProducts'])->name('category.show');;
//Route::post('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
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
Route::get('/profile/{user:username}', [UserController::class, 'profile']);

Route::post('/register-user', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Product routes

Route::get('/create-product', [ProductController::class, 'showCreateForm'])->middleware('auth');
Route::post('/create-product', [ProductController::class, 'storeProduct'])->middleware('auth');
Route::get('/product/{product}', [ProductController::class, 'viewSingleProduct']);
Route::delete('/product/{product}', [ProductController::class, 'delete'])->middleware('can:delete,product');
Route::get('/product/{product}/edit',[ProductController::class, 'showEditForm'])->middleware('can:update,product');
Route::put('/product/{product}', [ProductController::class, 'update'])->middleware('can:update,product');
Route::get('/search',[ProductController::class, 'search']);
Route::post('/product/{product}/comments', [ProductController::class, 'storeComment']);


