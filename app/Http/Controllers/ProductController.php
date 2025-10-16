<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::with('variants');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $products = $query->get();
        return view('products.index', compact('products', 'search'));
    }

    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}
