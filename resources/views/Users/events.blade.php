@extends('layout')

@section('content')

<body class="m-0">

    <div class="align-mid flex items-center justify-center pt-[100px] font-serif">
        <select id="eventType" name="eventType" class="w-1/4 rounded border px-3 py-2">
            <option value="all">All</option>
            <option value="venues">Musical Shows </option>
            <option value="Photo&Video">Dancing Shows</option>
            <option value="recreation">Conferences</option>
            <option value="workshop">Workshop</option>
        </select>
    </div>

    <div class="grid grid-cols-1 gap-8 p-6 sm:grid-cols-2 lg:grid-cols-5">
        @forelse($events as $event)
            <div class="group relative mt-[70px] flex flex-col overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 hover:shadow-2xl">
                <div class="h-64 w-full">
                    <img class="h-full w-full object-cover" src="{{ asset('img/' . $event->eventImage) }}" alt="{{ $event->eventName }}" />
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
            <p class="font-center col-span-1 font-serif text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
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
                <img class="h-full w-full object-contain" src="{{ asset('img/' . $event->eventImage) }}" alt="{{ $event->eventName }}" />
            </div>

            <p id="eventVenue" class="mb-2 text-sm text-gray-600"></p>
            <p class="mb-2 text-sm text-gray-600"><span class="font-semibold">Price Per Ticket:</span> LKR <span id="ticketPrice">0</span></p>

            <div class="mb-4 flex items-center gap-2">
                <button onclick="updateQuantity(-1)" class="rounded bg-gray-200 px-3 py-1 text-gray-800">-</button>
                <input id="ticketQuantity" type="number" value="1" min="1" readonly class="w-16 rounded border px-2 text-center">
                <button onclick="updateQuantity(1)" class="rounded bg-gray-200 px-3 py-1 text-gray-800">+</button>
            </div>

            <p class="mb-4 text-lg text-gray-700">
                <span class="font-semibold">Total Price:</span> LKR <span id="totalPrice">0</span>
            </p>

            <p class="font-bold">Ticket Policy</p>
            <p class="text-justify text-gray-700">Only the initial email or SMS provided by Pearl Princess Events will be accepted as proof of purchase. Tickets will not be redeemed for any forwarded or screenshots.<br>          
                Valid NIC or Passport may be required if needed during redemption.</p>

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

    <div id="paymentGateway" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="relative mx-auto mt-24 w-11/12 max-w-lg rounded-lg bg-white p-6 shadow-lg">
            <button class="absolute right-4 top-4 text-gray-600 hover:text-red-600" onclick="togglePaymentGateway()">✖</button>
            <h3 class="mb-4 text-lg font-semibold text-gray-700">Complete Your Payment</h3>
            <form id="paymentForm">
                
                <div class="mb-4">
                    <label for="nic" class="block text-gray-600">NIC Number</label>
                    <input type="text" id="nic" name="nic" placeholder="Enter your NIC" required class="w-full rounded border px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email Address</label>
                    {{-- <h2 id="email" name="email" placeholder="Enter your email" required class="w-full rounded border px-3 py-2">{{ auth()->user()->email }}</h2> --}}
                    <input type="email" id="email" name="email" placeholder="Enter your email" required class="w-full rounded border px-3 py-2">
                </div>
                <!-- Stripe Card Input -->
                <div id="cardElement" class="mb-4 border p-2"></div>
                <!-- Payment Button -->
                <button 
                    id="submitPayment" 
                    type="button" 
                    class="w-full rounded bg-green-500 px-4 py-2 text-white transition hover:bg-green-600"
                >
                    Pay Now
                </button>
            </form>
        </div>
    </div>
    

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let ticketPrice = 0; // To store the ticket price for calculations
        let cardElement = null; // To store the Stripe card element
    
        async function handlePayment(amount, eventId, eventName) {
    const nic = document.getElementById('nic').value;
    const email = document.getElementById('email').value;
    const ticketQuantity = parseInt(document.getElementById('ticketQuantity').value);

    if (!nic || !email) {
        alert('Please enter your NIC number and email address.');
        return;
    }

    try {
        // Send a request to the backend to create the PaymentIntent
        let response = await fetch('/purchase-ticket', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',  // Ensure CSRF protection
            },
            body: JSON.stringify({
                eventId: eventId,
                ticketQuantity: ticketQuantity,
                totalAmount: amount,
                nic: nic,
                email: email,
            }),
        });

        let data = await response.json();
        if (data.error) {
            alert(data.error);
            return;
        }

        // Confirm the payment using Stripe's client secret
        const { clientSecret } = data;
        let { paymentIntent, error } = await stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: cardElement,
            },
        });

        if (error) {
            alert('Payment failed: ' + error.message);
        } else {
            alert('Payment successful! A bill has been sent to your email.');
            togglePaymentGateway(); // Close the payment modal
        }
    } catch (err) {
        console.error(err);
        alert('An error occurred.');
    }
}


        // Handle the click of the 'Pay Now' button
        document.getElementById('submitPayment').addEventListener('click', () => {
            let amount = parseFloat(document.getElementById('totalPrice').textContent);
            let eventId = 'exampleEventId'; // Replace with actual event ID
            let eventName = document.getElementById('eventTitle').textContent;
    
            handlePayment(amount, eventId, eventName);
        });
    
        // Initialize the Stripe payment form
        document.addEventListener('DOMContentLoaded', () => {
            const stripe = Stripe('your-public-key-here'); // Use your actual Stripe public key
            const elements = stripe.elements();
            cardElement = elements.create('card');
            cardElement.mount('#cardElement'); // Mount the Stripe card element
        });
    
        // Toggle the booking form visibility
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
    
        // Update the quantity of tickets
        function updateQuantity(amount) {
            const quantityInput = document.getElementById('ticketQuantity');
            let quantity = parseInt(quantityInput.value);
            quantity = Math.max(1, quantity + amount);
            quantityInput.value = quantity;
    
            const totalPrice = quantity * ticketPrice;
            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }
    
        // Show the payment gateway after the user selects the tickets
        function showPaymentGateway() {
            toggleBookingForm();
            document.getElementById('paymentGateway').classList.remove('hidden');
        }
    
        // Toggle the visibility of the payment gateway
        function togglePaymentGateway() {
            document.getElementById('paymentGateway').classList.add('hidden');
        }


    </script>
    
</body>

@endsection
