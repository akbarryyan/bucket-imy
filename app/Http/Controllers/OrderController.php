<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('user.my_account', compact('orders'));
    }

    public function getOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        Log::info('Orders:', $orders->toArray());

        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Order::with('details')->findOrFail($id);

        return view('user.order_details', compact('order'));
    }
}
