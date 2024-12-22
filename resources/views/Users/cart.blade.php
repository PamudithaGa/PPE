@extends('layout')

@section('content')
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="mb-6 mt-[90px] text-3xl font-bold text-gray-800">{{ auth()->user()->name }}'s Cart</h1>
        
        <!-- Cart Items -->
        <div class="mb-6 rounded-lg bg-white p-6 shadow-lg">
            <div class="grid grid-cols-12 items-center gap-4 border-b pb-4">
                <!-- Item Image -->
                <div class="col-span-2">
                    <img src="https://via.placeholder.com/150" alt="Item Image" class="rounded-lg">
                </div>
                <!-- Item Details -->
                <div class="col-span-6">
                    <h2 class="text-lg font-semibold text-gray-700">Product Name</h2>
                    <p class="text-sm text-gray-500">Short description of the product goes here.</p>
                </div>
                <!-- Quantity Selector -->
                <div class="col-span-2 text-center">
                    <input type="number" min="1" value="1" class="w-16 rounded-lg border border-gray-300 p-2 text-center focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Price -->
                <div class="col-span-2 text-right">
                    <p class="text-lg font-semibold text-gray-700">LKR 10,000</p>
                </div>
            </div>
            <!-- Additional items can be added similarly -->
        </div>

        <!-- Cart Summary -->
        <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-white p-6 shadow-lg sm:flex-row">
            <div>
                <p class="text-lg font-semibold text-gray-700">Subtotal: <span class="text-blue-600">LKR 10,000</span></p>
                <p class="text-sm text-gray-500">Taxes and shipping calculated at checkout.</p>
            </div>
            <button class="rounded-lg bg-green-600 px-6 py-3 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Proceed to Checkout
            </button>
        </div>
    </div>
</body>

@endsection 