<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%')
                ->orWhere('price', 'like', '%'.$request->search.'%');
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
}
