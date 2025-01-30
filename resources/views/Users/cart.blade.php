{{-- resources\views\Users\cart.blade.php --}}
@extends('layout')

@section('content')

<body class="bg-gray-50 font-sans text-gray-800">
  <div class="container mx-auto p-6">
    <!-- Page Title -->
    <h1 class="mb-6 mt-[100px] text-2xl font-bold">My Shopping Bag</h1>

    <div class="flex flex-col gap-8 lg:flex-row">
      <!-- Shopping Bag Items -->
      <div class="flex-1 rounded-lg bg-white p-6 shadow-md">
        <table class="w-full table-auto">
          <thead>
            <tr class="border-b text-left">
              <th class="pb-4">Product</th>
              <th class="pb-4">Price</th>
              <th class="pb-4">Total</th>
            </tr>
          </thead>


          <tbody>
            @forelse($cartItems as $cartItem)
                <tr class="border-b">
                    <td class="py-4">
                        <div class="flex items-center gap-4">
                            <img class="h-20 w-20 rounded object-cover" 
                                 src="{{ asset('img/' . $cartItem->product->image) }}" 
                                 alt="{{ $cartItem->product->name }}">
                            <div>
                                <h3 class="font-semibold">{{ $cartItem->product->name }}</h3>
                                <p class="text-sm text-gray-600">Qty: {{ $cartItem->quantity }}</p>
                                <div class="mt-2 flex gap-4 text-sm">
                                  <form action="{{ route('cart.remove', $cartItem->_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-indigo-600 hover:underline">Remove</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">LKR {{ $cartItem->product->price }}</td>
                    <td class="py-4">LKR {{ $cartItem->product->price * $cartItem->quantity }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-4 text-center text-gray-500">Your cart is empty.</td>
                </tr>
            @endforelse
        </tbody>
                
        </table>
      </div>


      <div class="w-full rounded-lg bg-white p-6 shadow-md lg:w-1/3">
        <h2 class="mb-4 text-lg font-semibold">Summary</h2>
        <div class="mb-4">
          <label for="promo-code" class="mb-1 block text-sm font-medium text-gray-700">Do you have a promo code?</label>
          <div class="flex">
            <input type="text" id="promo-code" class="flex-1 rounded-l border border-gray-300 px-4 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Enter promo code">
            <button class="rounded-r bg-black px-4 py-2 text-sm text-white">Apply</button>
          </div>
        </div>
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
        


<!-- Alpine.js Modal -->
<div x-data="{ showModal: false }">
  <button @click="showModal = true" class="mt-4 w-full rounded bg-black py-3 text-sm font-bold uppercase text-white">
      Checkout
  </button>

  <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
          <h2 class="mb-4 text-lg font-semibold">Billing Details</h2>
          <form action="{{ route('checkout.index') }}" method="GET">
              @csrf
              <label class="block text-sm font-medium text-gray-700">Full Name</label>
              <input type="text" name="full_name" class="w-full rounded border px-4 py-2 text-sm text-black" required>

              <label class="mt-4 block text-sm font-medium text-gray-700">Address</label>
              <input type="text" name="address" class="w-full rounded border px-4 py-2 text-sm text-black" required>

              <label class="mt-4 block text-sm font-medium text-gray-700">Phone Number</label>
              <input type="text" name="phone_number" class="w-full rounded border px-4 py-2 text-sm text-black" required>
              
              <div class="mt-4 flex justify-between">
                  <button type="button" @click="showModal = false" class="px-4 py-2 text-sm text-gray-600">Cancel</button>
                  <button type="submit" class="rounded bg-black px-4 py-2 text-sm font-bold uppercase text-white">
                      Proceed to Payment
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>



        <p class="mt-4 text-sm text-gray-500">Need help? Contact us at <a href="tel:+94726442538" class="text-indigo-600 hover:underline">0784722795</a></p>
      </div>
    </div>
  </div>





  
  
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


  
</body>

@endsection 