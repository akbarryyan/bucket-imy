<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\OrderCustomController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\CustomCheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomOrderController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\DashboardUserController;

Route::get('/', function () {
    return view('user_auth.login');
});

Route::get('/test', function () {
    return view('test');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
    Route::get('payments', [PaymentController::class, 'showPayments'])->name('payments'); Route::post('payments', [PaymentController::class, 'storePayment'])->name('payments.store'); Route::put('payments/{id}', [PaymentController::class, 'updatePayment'])->name('payments.update'); Route::delete('payments/{id}', [PaymentController::class, 'destroyPayment'])->name('payments.destroy');
    Route::get('profits', [ProfitController::class, 'showProfits'])->name('profits');
    Route::post('profits/calculate-daily-profit', [ProfitController::class, 'calculateDailyProfit'])->name('calculateDailyProfit');
    Route::post('profits/calculate-monthly-profit', [ProfitController::class, 'calculateMonthlyProfit'])->name('calculateMonthlyProfit');
    Route::get('profits/daily-pdf', [ProfitController::class, 'generateDailyProfitPDF'])->name('profits.daily-pdf');
    Route::get('profits/monthly-pdf', [ProfitController::class, 'generateMonthlyProfitPDF'])->name('profits.monthly-pdf');
    Route::get('sales-data', [DashboardController::class, 'getSalesData'])->name('salesData');
    Route::get('materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::post('materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::put('materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');
    Route::get('custom-orders', [CustomOrderController::class, 'index'])->name('customOrders.index');
    Route::get('custom-orders/{order}', [CustomOrderController::class, 'show'])->name('customOrders.show');
    Route::delete('custom-orders/{order}', [CustomOrderController::class, 'destroy'])->name('customOrders.destroy');
    Route::post('custom-orders/{order}/update-status', [CustomOrderController::class, 'updateStatus'])->name('customOrders.updateStatus');
});


Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::post('add/{productId}', [CartController::class, 'addToCart'])->name('add');
        Route::get('/', [CartController::class, 'index'])->name('index');
        // Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
    });
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('dashboard', function() {
    //     return view('dashboard');
    // })->name('dashboard.user');
    Route::get('dashboard',[DashboardUserController::class, 'index'])->name('dashboard.user');
    Route::get('products', [ProductUserController::class, 'index'])->name('products.index');
    Route::get('cart/data', [CartController::class, 'getCartData'])->name('cart.data');
    Route::delete('cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('cart/checkout', [CartController::class, 'showCheckoutForm'])->name('cart.checkout');
    Route::post('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout.post');
    Route::get('cart/custom-checkout/{order_id}', [CustomCheckoutController::class, 'show'])->name('cart.customCheckout');
    Route::post('cart/custom-checkout', [CustomCheckoutController::class, 'store'])->name('cart.customCheckout.store');
    Route::get('my-account', [AccountController::class, 'index'])->name('account.index');
    Route::put('my-account', [AccountController::class, 'update'])->name('account.update');
    Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/orders', [OrderController::class, 'getOrders'])->name('orders.get');
    Route::get('custom-order/{id}', [CustomOrderController::class, 'show'])->name('customOrder.show');
    Route::get('custom-order', [OrderCustomController::class, 'index'])->name('custom-order.index');
    Route::get('/custom-orders', [OrderCustomController::class, 'getCustomOrders'])->name('customOrders.get');
    Route::post('custom-order/store', [OrderCustomController::class, 'store'])->name('customOrder.store');
    Route::post('custom-order/confirm', [OrderCustomController::class, 'confirm'])->name('customOrder.confirm');
});

// Rute untuk login dan register pengguna
Route::get('user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('user/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('user/register', [UserAuthController::class, 'register'])->name('user.register.submit');







