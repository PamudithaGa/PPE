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
          {{-- <tbody>

            <tr class="border-b">
              <td class="py-4">
                <div class="flex items-center gap-4">
                  <img class="h-20 w-20 rounded object-cover" src="https://via.placeholder.com/80" alt="Product Image">
                  <div>
                    <h3 class="font-semibold">Fergus S Strap Automatic 42mm</h3>
                    <p class="text-sm text-gray-600">Item No: 796483117334</p>
                    <p class="text-sm text-gray-600">Size: OS</p>
                    <p class="text-sm text-gray-600">Color: Silver/Black/Tan</p>
                    <p class="text-sm text-gray-600">Qty: 1</p>
                    <div class="mt-2 flex gap-4 text-sm">
                      <a href="#" class="text-indigo-600 hover:underline">Remove</a>
                      <a href="#" class="text-indigo-600 hover:underline">Edit</a>
                    </div>
                  </div>
                </div>
              </td>
              <td class="py-4">
                <span class="text-gray-400 line-through">$425.00</span><br>
                <span>$297.50</span>
              </td>
              <td class="py-4">$297.50</td>
            </tr>

            <tr class="border-b">
              <td class="py-4">
                <div class="flex items-center gap-4">
                  <img class="h-20 w-20 rounded object-cover" src="https://via.placeholder.com/80" alt="Product Image">
                  <div>
                    <h3 class="font-semibold">New Q Zippers Huge Hillier Hobo</h3>
                    <p class="text-sm text-gray-600">Item No: 888877362172</p>
                    <p class="text-sm text-gray-600">Size: 1SZ</p>
                    <p class="text-sm text-gray-600">Color: Black Multi</p>
                    <p class="text-sm text-gray-600">Qty: 1</p>
                    <div class="mt-2 flex gap-4 text-sm">
                      <a href="#" class="text-indigo-600 hover:underline">Remove</a>
                      <a href="#" class="text-indigo-600 hover:underline">Edit</a>
                    </div>
                  </div>
                </div>
              </td>
              <td class="py-4">$598.00</td>
              <td class="py-4">$598.00</td>
            </tr>

            <tr>
              <td class="py-4">
                <div class="flex items-center gap-4">
                  <img class="h-20 w-20 rounded object-cover" src="https://via.placeholder.com/80" alt="Product Image">
                  <div>
                    <h3 class="font-semibold">Baker 36mm</h3>
                    <p class="text-sm text-gray-600">Item No: 796483029149</p>
                    <p class="text-sm text-gray-600">Size: OS</p>
                    <p class="text-sm text-gray-600">Color: Black</p>
                    <p class="text-sm text-gray-600">Qty: 1</p>
                    <div class="mt-2 flex gap-4 text-sm">
                      <a href="#" class="text-indigo-600 hover:underline">Remove</a>
                      <a href="#" class="text-indigo-600 hover:underline">Edit</a>
                    </div>
                  </div>
                </div>
              </td>
              <td class="py-4">$195.00</td>
              <td class="py-4">$195.00</td>
            </tr>
          </tbody> --}}


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
            <span>$1,090.50</span>
          </div>
          <div class="mb-2 flex justify-between text-sm">
            <span>Shipping</span>
            <span>TBD</span>
          </div>
          <div class="mb-4 flex justify-between text-sm">
            <span>Sales Tax</span>
            <span>TBD</span>
          </div>
          <div class="flex justify-between text-lg font-semibold">
            <span>Estimated Total</span>
            <span>$1,090.50</span>
          </div>
        </div>
        <button class="mt-4 w-full rounded bg-black py-3 text-sm font-bold uppercase text-white">Checkout</button>
        <p class="mt-4 text-sm text-gray-500">Need help? Call us at <a href="tel:1-877-707-6272" class="text-indigo-600 hover:underline">1-877-707-6272</a></p>
      </div>
    </div>
  </div>
</body>

@endsection 