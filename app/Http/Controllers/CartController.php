<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        $product = Product::find($productId);
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'description' => $product->description,
                'image' => $product->image,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        return view('cart.index');
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function updateQuantity(Request $request, $id)
    {
        if ($request->action == 'increase') {
            Session::increment("cart.$id.quantity");
        } elseif ($request->action == 'decrease') {
            if (session("cart.$id.quantity") > 1) {
                Session::decrement("cart.$id.quantity");
            } else {
                Session::forget("cart.$id");
            }
        }

        // Recalculate the total price
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, session('cart', [])));

        return response()->json(['success' => true, 'total' => $total]);
    }
}
