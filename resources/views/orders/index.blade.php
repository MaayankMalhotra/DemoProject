@extends('main')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">My Orders</h1>
        <div class="flex flex-wrap justify-center mb-4">
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-white shadow-md rounded p-4">
                    <h2 class="text-lg font-bold mb-2">Order Summary</h2>
                    <ul class="list-none mb-4">
                        <li class="flex justify-between mb-2">
                            <span class="text-gray-600">Total Orders</span>
                            <span class="font-bold">{{ $orders->count() }}</span>
                        </li>
                        <li class="flex justify-between mb-2">
                            <span class="text-gray-600">Total Amount</span>
                            <span class="font-bold">${{ number_format($orders->sum('total'), 2) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">Order ID</th>
                        <th class="py-2 px-4 border-b">Customer Name</th>
                        <th class="py-2 px-4 border-b">Total</th>
                        <th class="py-2 px-4 border-b">Order Date</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-gray-200">
                            <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->customer_name }}</td>
                            <td class="py-2 px-4 border-b">${{ number_format($order->total, 2) }}</td>
                            <td class="py-2 px-4 border-b">{{ $order->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('order.invoice', $order->id) }}"
                                    class="bg-orange-500 hover:bg-orange-700 text-white text-sm font-bold py-2 px-4 rounded">Download
                                    Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
