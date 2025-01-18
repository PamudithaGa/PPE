@extends('layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="mb-6 mt-[100px] text-center text-3xl font-bold text-gray-800">My Orders</h1>

    <!-- Grid Layout for Orders -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach($orders as $order)
        <div class="rounded-lg bg-white p-6 shadow-lg transition duration-300 hover:shadow-xl">
            <!-- Order Header -->
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800">Order #{{ $order->_id }}</h2>
                <span class="px-3 py-1 text-xs font-bold uppercase rounded-full 
                             @if($order->payment_status == 'pending') bg-yellow-500 text-white 
                             @elseif($order->payment_status == 'completed') bg-green-500 text-white 
                             @else bg-red-500 text-white @endif">
                    {{ ucfirst($order->payment_status) }}
                </span>
            </div>

            <!-- Order Info -->
            <div class="mb-4 grid grid-cols-2 gap-6">
                <p class="text-sm text-gray-600"><strong>Total:</strong> LKR {{ number_format($order->total_amount, 2) }}</p>
                <p class="text-sm text-gray-600"><strong>Address:</strong> {{ $order->address }}</p>
            </div>

            <!-- Items Section -->
            <div class="mb-4 rounded-lg border p-4">
                <h3 class="text-sm font-semibold text-gray-800">Items:</h3>
                <ul class="list-disc pl-5 text-gray-700">
                    @foreach($order->items as $item)
                        <li>{{ $item['name'] }} ({{ $item['quantity'] }}) - LKR {{ number_format($item['price'], 2) }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection
