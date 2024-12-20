<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderCustom;
use App\Models\Payment;

class CustomCheckoutController extends Controller
{
    public function show($order_id)
    {
        $order = OrderCustom::with('details.material')->findOrFail($order_id);
        $payments = Payment::all(); // Pastikan Anda memiliki model Payment untuk mengambil data pembayaran
        return view('cart.custom_checkout', compact('order', 'payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_method' => 'required|string',
            'delivery_time' => 'required|date',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
            'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $order = OrderCustom::findOrFail($request->order_id);
        $order->update([
            'shipping_method' => $request->shipping_method,
            'delivery_time' => $request->delivery_time,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
            'payment_proof' => $request->hasFile('payment_proof') ? $request->file('payment_proof')->store('payments', 'public') : null,
            'status' => 'confirmed',
        ]);

        return redirect()->route('dashboard.user')->with('success', 'Custom order has been successfully placed.');
    }
}
