<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $featured = Product::orderBy('id', 'desc')->get();
        return view('dashboard', compact('products', 'featured'));
    }
}
