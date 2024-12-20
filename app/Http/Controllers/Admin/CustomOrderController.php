<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderCustom;

class CustomOrderController extends Controller
{
    public function index()
    {
        $customOrders = OrderCustom::with('user', 'details.material')->get();
        return view('admin.custom_orders.index', compact('customOrders'));
    }

    public function show($id)
    {
        $order = OrderCustom::with('user', 'details.material')->findOrFail($id);
        return view('admin.custom_orders.show', compact('order'));
    }

    public function destroy($id) {
        $order = OrderCustom::findOrFail($id);
        $order->delete();
        
        return redirect()->route('admin.customOrders.index')->with('success', 'Custom order deleted successfully');
    }
    public function updateStatus(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:pending,on process,delivery,completed',
        ]);
        
        $order = OrderCustom::findOrFail($id);
        $order->update(['status' => $request->status]);
        
        return redirect()->route('admin.customOrders.index')->with('success', 'Order status updated successfully');
    }
}
