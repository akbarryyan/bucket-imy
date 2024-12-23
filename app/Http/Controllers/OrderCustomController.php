<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderCustom;
use App\Models\OrderCustomDetail;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class OrderCustomController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('custom_order.index', compact('materials'));
    }

    public function store(Request $request)
    {
        logger('Request received in store method.');
        logger('Materials: ' . json_encode($request->materials));
        logger('Total Price: ' . $request->total_price);

        $request->validate([
            'materials' => 'required|array',
            'materials.*' => 'exists:materials,id',
            'total_price' => 'required|numeric',
        ]);

        logger('Validation passed.');

        $customOrder = OrderCustom::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        logger('Custom order created: ' . json_encode($customOrder));

        foreach ($request->materials as $materialId) {
            $material = Material::find($materialId);
            logger('Material found: ' . json_encode($material));
            OrderCustomDetail::create([
                'order_custom_id' => $customOrder->id,
                'material_id' => $material->id,
                'quantity' => 1,
                'price' => $material->price,
            ]);
        }

        logger('Custom order details created.');

        return response()->json([
            'message' => 'Order created!',
            'order_id' => $customOrder->id,
            'redirect_url' => route('cart.customCheckout', ['order_id' => $customOrder->id]),
        ]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:order_customs,id',
        ]);

        $order = OrderCustom::where('id', $request->order_id)
                            ->where('user_id', Auth::id())
                            ->first();

        if (!$order) {
            return back()->withErrors(['error' => 'Failed to confirm order.']);
        }

        // Logika untuk konfirmasi order
        $order->status = 'confirmed';
        $order->save();

        return redirect()->route('cart.customCheckout', ['order_id' => $request->order_id])->with('success', 'Order confirmed successfully.');
    }
}

