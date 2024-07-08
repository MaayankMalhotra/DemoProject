<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// Import the Session facade

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    public function Order(Request $request)
    {
        $order = new Order();
        $order->customer_name = $request->name;
        $order->customer_email = $request->email;
        $order->customer_address = $request->address;
        $order->payment_method = $request->payment_method;
        $order->total = $request->total;
        $order->save();

        $cart = Session::get('cart', []);
        foreach ($cart as $id => $details) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $details['quantity'];
            $orderItem->price = $details['price'];
            $orderItem->save();
        }
        if ($request->payment_method == 'cash_on_delivery') {
            Session::forget('cart');

            return redirect()->route('products.index')->with('success', 'Order placed successfully!');
        } elseif ($request->payment_method == 'razorpay') {
            // Redirect to Razorpay payment page
            return redirect()->route('razorpay.order')->withInput($request->all() + ['total' => $order->total]);
        }
    }

    public function generateInvoice($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        $pdf = Pdf::loadView('invoices.order', compact('order'));

        return $pdf->download('invoice.pdf');
    }

    public function index()
    {
        $orders = Order::with('orderItems.product')->get();

        return view('orders.index', compact('orders'));
    }
}
