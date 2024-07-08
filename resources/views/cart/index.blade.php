@extends('main')
@section('content')
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
            <h1 class="text-3xl font-bold mb-6 text-center">Your Shopping Cart</h1>
            @if (session('cart'))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach (session('cart') as $id => $details)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}"
                                class="w-full h-48 object-cover rounded mb-4">
                            <h2 class="text-2xl font-bold mb-2">{{ $details['name'] }}</h2>
                            {{-- <p class="text-gray-700">{{ $details['description'] }}</p> --}}
                            <p class="text-gray-700 font-bold mb-2">${{ $details['price'] }}</p>
                            <div class="flex items-center mb-4">
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-2 py-1 rounded-l"
                                    onclick="decreaseQuantity({{ $id }})">-</button>
                                <input type="text" value="{{ $details['quantity'] }}"
                                    class="w-12 text-center border-t border-b border-gray-300" readonly>
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-2 py-1 rounded-r"
                                    onclick="increaseQuantity({{ $id }})">+</button>
                            </div>
                            <div class="w-full">
                                <a class="text-white hover:text-white hover:bg-red-700 py-2 px-3 text-sm rounded bg-red-800 w-full block text-center"
                                    href="{{ route('cart.remove', $id) }}">Remove</a>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="mt-8 text-center">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full"
                        href="{{ route('checkout.index') }}">Proceed to Checkout</a>
                </div>
            @else
                <p class="text-gray-700 text-center">Your cart is empty</p>
            @endif
        </div>
    </div>

    <script>
        function decreaseQuantity(id) {
            updateQuantity(id, 'decrease');
        }

        function increaseQuantity(id) {
            updateQuantity(id, 'increase');
        }

        function updateQuantity(id, action) {
            fetch(`/cart/update/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        action: action
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Reload the page to reflect the updated quantity
                    } else {
                        alert('Failed to update quantity');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
