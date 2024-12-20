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
        $request->validate([
            'materials' => 'required|array',
            'materials.*' => 'exists:materials,id',
            'total_price' => 'required|numeric',
        ]);

        $customOrder = OrderCustom::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        foreach ($request->materials as $materialId) {
            $material = Material::find($materialId);
            OrderCustomDetail::create([
                'order_custom_id' => $customOrder->id,
                'material_id' => $material->id,
                'quantity' => 1,
                'price' => $material->price,
            ]);
        }

        return response()->json([
            'message' => 'Order confirmed!',
            'redirect_url' => route('cart.customCheckout', ['order_id' => $customOrder->id]),
        ]);
    }

}

