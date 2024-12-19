<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
});

Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


// Route::get('login', function() {
//     return 'Login Page';
// })->name('login');

// Route::prefix('cart')->name('cart.')->middleware('auth')->group(function () {
//     Route::post('add/{productId}', [CartController::class, 'addToCart'])->name('add');
//     Route::get('/', [CartController::class, 'index'])->name('index');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('products', [ProductController::class, 'index'])->name('products.index');
//     Route::prefix('cart')->name('cart.')->group(function () {
//         Route::post('add/{productId}', [CartController::class, 'addToCart'])->name('add');
//         Route::get('/', [CartController::class, 'index'])->name('index');
//         Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
//         Route::delete('remove/{itemId}', [CartController::class, 'remove'])->name('remove');
//     });
//     Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
// });

Route::get('products', [ProductUserController::class, 'index'])->name('products.index');

Route::middleware(['auth'])->group(function () {
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::post('add/{productId}', [CartController::class, 'addToCart'])->name('add');
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::delete('remove/{itemId}', [CartController::class, 'remove'])->name('remove');
    });
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard.user');
});

// Route::middleware(['auth'])->group(function () {
//     Route::prefix('cart')->name('cart.')->group(function () {
//         Route::post('add/{productId}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add');
//         Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('index');
//         Route::post('checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
//         Route::delete('remove/{itemId}', [App\Http\Controllers\CartController::class, 'remove'])->name('remove');
//     });
    
//     // Rute untuk menampilkan pesanan
//     Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
// });



// Rute untuk login dan register pengguna
Route::get('user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('user/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('user/register', [UserAuthController::class, 'register'])->name('user.register.submit');





