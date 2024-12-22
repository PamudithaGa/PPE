@extends('layout')

@section('content')

<body class="m-0">
    <div class="grid grid-cols-1 gap-8 p-6 sm:grid-cols-2 lg:grid-cols-5">
        @forelse($events as $event)
            <div class="group relative mt-[70px] flex flex-col overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 hover:shadow-2xl">
                <div class="h-64 w-full">
                    <img class="h-full w-full object-cover" src="{{ asset('img/' . $event->eventImage) }}" alt="Event Image" />
                </div>
                
                <div class="p-6 text-gray-800">
                    <h3 class="mb-2 text-xl font-semibold transition-colors duration-300 group-hover:text-blue-500">{{ $event->eventName }}</h3>
                    <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Date:</span> {{ $event->eventDate }}</p>
                    <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Venue:</span> {{ $event->eventVenue }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                    
                    <div class="mt-4 flex w-full">
                        <button 
                            class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600"
                            onclick="toggleBookingForm('{{ $event->_id }}', '{{ $event->eventName }}', '{{ $event->eventVenue }}', {{ $event->ticketPrice }})"
                        >
                            Get Tickets
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-1 text-center text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
        @endforelse
    </div>

    <!-- Ticket Booking Modal -->
    <div id="bookingForm" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="relative mx-auto mt-24 w-11/12 max-w-lg rounded-lg bg-white p-6 shadow-lg">
            <button 
                class="absolute right-4 top-4 text-gray-600 hover:text-red-600"
                onclick="toggleBookingForm()"
            >
                ✖
            </button>
            <h3 id="eventTitle" class="mb-4 text-lg font-semibold text-gray-700"></h3>
            
            <div class="h-64 w-full">
                <img class="h-full w-full object-contain" src="{{ asset('img/' . $event->eventImage) }}" alt="Event Image" />
            </div>
            
            <p id="eventVenue" class="text-bold mb-2 text-sm text-white"></p>
            <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Venue:</span> {{ $event->eventVenue }}</p>
            <p class="mb-2 text-sm text-gray-600"><span class="font-semibold">Price Per Ticket:</span> LKR <span id="ticketPrice">0</span></p>
            
            <!-- Quantity Selector -->
            <div class="mb-4 flex items-center gap-2">
                <button onclick="updateQuantity(-1)" class="rounded bg-gray-200 px-3 py-1 text-gray-800">-</button>
                <input id="ticketQuantity" type="number" value="1" min="1" readonly class="w-16 rounded border px-2 text-center">
                <button onclick="updateQuantity(1)" class="rounded bg-gray-200 px-3 py-1 text-gray-800">+</button>
            </div>
            
            <!-- Total Price -->
            <p class="mb-4 text-lg text-gray-700">
                <span class="font-semibold">Total Price:</span> LKR <span id="totalPrice">0</span>
            </p>
            
            <p class="font-bold">Ticket Policy</p>
            <p class="text-justify text-gray-700">Only the initial email or SMS provided by Pearl Princess Events will be accepted as proof of purchase, Tickets will not be redeemed for any forwarded or screenshots.<br>          
                Valid NIC or Passport will be required if needed during the process of Redeeming.</p>

            <!-- Purchase Button -->
            <div class="mt-4">
                <button 
                    onclick="showPaymentGateway()"
                    class="w-full rounded bg-green-500 px-4 py-2 text-white transition hover:bg-green-600"
                >
                    Purchase
                </button>
            </div>
        </div>
    </div>

    <!-- Payment Gateway -->
    <div id="paymentGateway" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="relative mx-auto mt-24 w-11/12 max-w-lg rounded-lg bg-white p-6 shadow-lg">
            <button 
                class="absolute right-4 top-4 text-gray-600 hover:text-red-600"
                onclick="togglePaymentGateway()"
            >
                ✖
            </button>
            <h3 class="mb-4 text-lg font-semibold text-gray-700">Complete Your Payment</h3>
            {{-- <p class="mb-4 text-gray-600">Select your payment method:</p> --}}
            <!-- Example Payment Gateways -->
            <div class="flex flex-col gap-4">
                <button class="w-full rounded bg-blue-500 px-4 py-2 text-white">Pay with Credit Card</button>
                {{-- <button class="w-full rounded bg-yellow-500 px-4 py-2 text-white">Pay with PayPal</button>
                <button class="w-full rounded bg-gray-700 px-4 py-2 text-white">Pay with Stripe</button> --}}
            </div>
        </div>
    </div>

    <script>
        let ticketPrice = 0;

        function toggleBookingForm(eventId = '', eventName = '', eventVenue = '', price = 0) {
            const form = document.getElementById('bookingForm');
            if (eventId) {
                document.getElementById('eventTitle').textContent = eventName;
                document.getElementById('eventVenue').textContent = `Venue: ${eventVenue}`;
                document.getElementById('ticketPrice').textContent = price.toFixed(2);
                document.getElementById('ticketQuantity').value = 1;
                document.getElementById('totalPrice').textContent = price.toFixed(2);
                ticketPrice = price;
            }
            form.classList.toggle('hidden');
        }

        function updateQuantity(amount) {
            const quantityInput = document.getElementById('ticketQuantity');
            let quantity = parseInt(quantityInput.value);
            quantity = Math.max(1, quantity + amount);
            quantityInput.value = quantity;

            // Update total price
            const totalPrice = quantity * ticketPrice;
            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }

        function showPaymentGateway() {
            toggleBookingForm(); // Hide booking form
            document.getElementById('paymentGateway').classList.remove('hidden');
        }

        function togglePaymentGateway() {
            document.getElementById('paymentGateway').classList.add('hidden');
        }
    </script>
</body>

@endsection
