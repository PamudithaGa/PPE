@extends('layout')

@section('content')
<body class="bg-gray-50 font-sans text-gray-800">
  <div class="container mx-auto p-6">
    <h1 class="mb-6 mt-[100px] text-2xl font-bold">Checkout</h1>

    <div class="flex flex-col gap-8 lg:flex-row">
      <!-- Order Summary -->
      <div class="flex-1 rounded-lg bg-white p-6 shadow-md">
        <h2 class="mb-4 text-lg font-semibold">Order Summary</h2>
        <table class="w-full table-auto">
          <thead>
            <tr class="border-b text-left">
              <th class="pb-4">Product</th>
              <th class="pb-4">Price</th>
              <th class="pb-4">Total</th>
            </tr>
          </thead>

          <tbody>
            @foreach($cartItems as $cartItem)
                <tr class="border-b">
                    <td class="py-4">
                        <div class="flex items-center gap-4">
                            <img class="h-20 w-20 rounded object-cover" 
                                 src="{{ asset('img/' . $cartItem->product->image) }}" 
                                 alt="{{ $cartItem->product->name }}">
                            <div>
                                <h3 class="font-semibold">{{ $cartItem->product->name }}</h3>
                                <p class="text-sm text-gray-600">Qty: {{ $cartItem->quantity }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">LKR {{ $cartItem->product->price }}</td>
                    <td class="py-4">LKR {{ $cartItem->product->price * $cartItem->quantity }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
        
        <div class="border-t py-4">
          <div class="mb-2 flex justify-between text-sm">
            <span>Subtotal</span>
            <span>LKR {{ number_format($subtotal, 2) }}</span>
          </div>
          <div class="mb-2 flex justify-between text-sm">
            <span>Shipping</span>
            <span>LKR {{ number_format($shipping, 2) }}</span>
          </div>
          <div class="flex justify-between text-lg font-semibold">
            <span>Estimated Total</span>
            <span>LKR {{ number_format($total, 2) }}</span>
          </div>
        </div>
      </div>

      <!-- Shipping Information -->
      <div class="w-full rounded-lg bg-white p-6 shadow-md lg:w-1/3">
        <h2 class="mb-4 text-lg font-semibold">Shipping Information</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="name" name="name" class="w-full rounded border-gray-300 p-2 text-sm" required>
          </div>
          <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" name="address" class="w-full rounded border-gray-300 p-2 text-sm" required>
          </div>
          <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" id="phone" name="phone" class="w-full rounded border-gray-300 p-2 text-sm" required>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="mt-4 w-full rounded bg-black py-3 text-sm font-bold uppercase text-white">Proceed to Payment</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
@endsection
