<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderCustom;

class CustomOrderController extends Controller
{
    public function index()
    {
        $orders = OrderCustom::with('user')->get();
        return view('admin.custom_orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = OrderCustom::with('details.material')->findOrFail($id);
        return view('admin.custom_orders.show', compact('order'));
    }
}
