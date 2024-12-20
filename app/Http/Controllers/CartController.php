<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\OrderCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;

        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();

        // Pastikan pengguna memiliki keranjang
        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);

        // Tambahkan produk ke keranjang atau update quantity jika sudah ada
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $request->quantity,
            ]);
        }

        if ($request->ajax()) {
            $cart->load('items.product');
            return response()->json(['cart' => $cart]);
        }
        
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    public function getCartData()
    {
        $user = Auth::user();
        $cart = $user ? $user->cart()->with('items.product')->first() : null;

        return response()->json(['cart' => $cart]);
    }

    public function remove($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cart = $cartItem->cart;
        $cartItem->delete();

        $cart->load('items.product');
        return response()->json(['cart' => $cart]);
    }

    public function showCheckoutForm()
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.product')->first();
        $payments = Payment::all();  // Mengambil semua informasi rekening

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('cart.checkout', compact('cart', 'payments'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'shipping_method' => 'required|in:pickup,courier',
            'payment_method' => 'required|in:cash,bank',
            'payment_proof' => 'required_if:payment_method,bank|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'delivery_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $user = Auth::user();
        $cart = $user->cart;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $paymentProofPath = $request->payment_method === 'bank' ? $request->file('payment_proof')->store('payment_proofs', 'public') : null;

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'shipping_address' => $request->shipping_address,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
            'payment_proof' => $paymentProofPath,
            'delivery_time' => $request->delivery_time,
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Kosongkan keranjang setelah checkout
        $cart->items()->delete();

        return redirect()->route('dashboard.user')->with('success', 'Order placed successfully.');
    }
}

