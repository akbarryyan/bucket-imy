<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\DailyProfit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $usersCount = User::count();
            $productsCount = Product::count();
            $ordersCount = Order::count();
            
            $today = Carbon::today()->toDateString();
            $todayProfit = DailyProfit::where('date', $today)->sum('total_profit');

            return view('admin.dashboard', compact('usersCount', 'productsCount', 'ordersCount', 'todayProfit'));
        }

        return redirect('/admin/login')->with('error', 'You do not have admin access.');
    }

    public function getSalesData()
    {
        $salesData = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total_orders')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($salesData);
    }
}

