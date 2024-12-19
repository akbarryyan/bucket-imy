<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $usersCount = User::count();
            $productsCount = Product::count();
            $ordersCount = Order::count();

            return view('admin.dashboard', compact('usersCount', 'productsCount', 'ordersCount'));
        }

        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }
}
