<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ashwani Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class='flex shadow-md py-4 px-4 sm:px-10 bg-stone-800 font-sans min-h-[70px] tracking-wide relative z-50'>
        <div class='flex flex-wrap items-center justify-between gap-4 w-full'>
            <a href="{{ url('/') }}"><img
                    src="https://d1d5cy0fmpy9m8.cloudfront.net/images/1720265554ezgif.com-crop.jpg" alt="logo"
                    class='w-36' />
            </a>

            <div class="flex items-center space-x-4">
                <form action="{{ route('products.index') }}" method="GET" class="flex space-x-2 rounded shadow-md">
                    <div
                        class="flex rounded-md border-2 border-red-white overflow-hidden max-w-md mx-auto font-[sans-serif]">
                        <input type="text" placeholder="Search Something..." name="search"
                            class="w-full outline-none bg-white text-black text-sm px-4 py-2" />
                        <button type='submit' class="flex items-center justify-center bg-black px-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
                                class="fill-white">
                                <path
                                    d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
                <a href="{{ url('/') }}">
                    <button type="button"
                        class="w-9 h-9 border-2 border-white inline-flex items-center justify-center rounded  bg-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11px" fill="white" class="inline"
                            viewBox="0 0 320.591 320.591">
                            <path
                                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                data-original="#000000" />
                            <path
                                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                data-original="#000000" />
                        </svg>
                    </button>
                </a>
            </div>


            <div class='flex items-center max-lg:ml-auto space-x-5'>
                <a href="{{ route('cart.index') }}"> <span class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                            class="cursor-pointer fill-white hover:fill-[#007bff] inline" viewBox="0 0 512 512">
                            <path
                                d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zM150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm167 15c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0"
                                data-original="#000000"></path>
                        </svg>
                        <span
                            class="absolute left-auto -ml-1 top-0 rounded-full bg-red-500 px-1 py-0 text-xs text-white">
                            <b class="text-md">{{ session('cart') ? count(session('cart')) : 0 }}</b>
                        </span>
                    </span>
                </a>


            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 p-10 font-[sans-serif] tracking-wide">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="lg:flex lg:items-center">
                <a href="javascript:void(0)">
                    <img src="https://d1d5cy0fmpy9m8.cloudfront.net/images/1720265554ezgif.com-crop.jpg" alt="logo"
                        class="w-52" />
                </a>
            </div>

            <div class="lg:flex lg:items-center">
                <ul class="flex space-x-6">
                    <li>
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-300 hover:fill-white w-7 h-7"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7v-7h-2v-3h2V8.5A3.5 3.5 0 0 1 15.5 5H18v3h-2a1 1 0 0 0-1 1v2h3v3h-3v7h4a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-300 hover:fill-white w-7 h-7"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M21 5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5zm-2.5 8.2v5.3h-2.79v-4.93a1.4 1.4 0 0 0-1.4-1.4c-.77 0-1.39.63-1.39 1.4v4.93h-2.79v-8.37h2.79v1.11c.48-.78 1.47-1.3 2.32-1.3 1.8 0 3.26 1.46 3.26 3.26zM6.88 8.56a1.686 1.686 0 0 0 0-3.37 1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68zm1.39 1.57v8.37H5.5v-8.37h2.77z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                class="fill-gray-300 hover:fill-white w-7 h-7" viewBox="0 0 24 24">
                                <path
                                    d="M22.92 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.83 4.5 17.72 4 16.46 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98-3.56-.18-6.73-1.89-8.84-4.48-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.9 20.29 6.16 21 8.58 21c7.88 0 12.21-6.54 12.21-12.21 0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-6 text-white">Contact Us</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('orders.index') }}" class="text-gray-300 hover:text-white text-sm">Orders</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Email</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Phone</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Address</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-6 text-white">Information</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">About Us</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Terms &amp;
                            Conditions</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>

        <p class='text-gray-300 text-sm mt-10'>© 2023<a href='https://readymadeui.com/' target='_blank'
                class="hover:underline mx-1">ReadymadeUI</a>All Rights Reserved.
        </p>
    </footer>

    <script>
        // Toggle user account dropdown
        document.querySelector('[aria-label="User Account"]').addEventListener('click', function() {
            document.querySelector('.relative .absolute').classList.toggle('hidden');
        });
    </script>
</body>

</html>
