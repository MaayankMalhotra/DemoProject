@extends('main')
@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
            <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-600">Checkout</h1>
            <form action="{{ route('order.place') }}" method="POST"
                class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <div class="relative">
                        <input
                            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="name" id="name" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2a6 6 0 00-6 6v1.586l-.707.707A1 1 0 003 11.414V12a1 1 0 001 1h12a1 1 0 001-1v-.586a1 1 0 00-.293-.707L16 9.586V8a6 6 0 00-6-6zM4 8a4 4 0 118 0v1H4V8zm6 10a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <div class="relative">
                        <input
                            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="email" name="email" id="email" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2.94 6.94a1.5 1.5 0 012.12 0L10 11.88l4.94-4.94a1.5 1.5 0 112.12 2.12l-6 6a1.5 1.5 0 01-2.12 0l-6-6a1.5 1.5 0 010-2.12z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address</label>
                    <div class="relative">
                        <input
                            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="address" id="address" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2a6 6 0 00-6 6v1.586l-.707.707A1 1 0 003 11.414V12a1 1 0 001 1h12a1 1 0 001-1v-.586a1 1 0 00-.293-.707L16 9.586V8a6 6 0 00-6-6zM4 8a4 4 0 118 0v1H4V8zm6 10a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="payment_method">Payment Method</label>
                    <select
                        class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="payment_method" id="payment_method" required>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                        <option value="credit_card">Credit Card</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total">Total in ($USD)</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="total" id="total"
                        value="{{ array_sum(array_map(function ($item) {return $item['price'] * $item['quantity'];}, session('cart', []))) }}"
                        readonly>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline transform transition-transform duration-300 hover:scale-105"
                        type="submit">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
