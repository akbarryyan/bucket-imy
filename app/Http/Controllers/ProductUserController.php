<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index', compact('products'));
    }
}

