<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AboutUsController;
use app\Http\Controllers\AccountController;
use app\Http\Controllers\HomeController;
use app\Http\Controllers\CartController;
use app\Http\Controllers\AdminTodoProductController;
use app\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'viewHome'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'auth'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'storeUserData'])->name('register.submit');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/search', [ProductController::class, 'searchProduct'])->name('search');
// Route::get('/checkout', [AllController::class, 'checkout'])->name('checkout');

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/homepage', [HomeController::class, 'viewHomepage'])->name('homepage');
    Route::get('/transactions', [TransactionController::class, 'viewTransactions'])->name('transactions');

    Route::prefix('/products') -> group (function ($productID) {
        Route::get('/{productID}', [ProductController::class, 'viewProduct'])->name('products.view');
        Route::post('/', [ProductController::class, 'storeProduct'])->name('products.store');
        Route::get('/create', [ProductController::class, 'createProduct'])->name('products.create');
        Route::put('/{productID}', [ProductController::class, 'updateProduct'])->name('products.update');
        Route::delete('productID}/delete', [ProductController::class, 'deleteProduct'])->name('products.delete');
    });

    Route::prefix('/accounts') -> group (function ($accID) {
        Route::get('/', [AccountController::class, 'viewAccounts'])->name('accounts.view');
        Route::put('/{accountID}', [AccountController::class, 'updateAccounts'])->name('accounts.update');
    });
});

// Customer Routes
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');
    Route::get('/products', [AllController::class, 'viewProduct'])->name('products');

    Route::prefix('/cart') -> group (function ($accID) {
        Route::get('/', [CartController::class, 'viewCart'])->name('cart.view');
        Route::post('/{cartID}/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::delete('/{cartID}', [CartController::class, 'removeFromCart'])->name('cart.delete');
        Route::patch('/{cartID}/update', [CartController::class, 'updateCart'])->name('cart.update');
        Route::get('/{cartID}/checkout', [CartController::class, 'checkoutCart'])->name('cart.checkout');
    });
});
