@extends('layout')

@section('content')
<body class="m-0">
    <div class="align-mid flex items-center justify-center pt-[100px] font-serif">
        <select id="eventType" name="eventType" class="w-1/4 rounded border px-3 py-2">
            <option value="all">All</option>
            <option value="venues">Musical Shows</option>
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
                    <p class="mb-1 text-sm text-gray-600">
                        <span class="font-semibold">Venue:</span>
                        <a href="https://maps.google.com?q={{ urlencode($event->eventVenue) }}" target="_blank" class="text-gray-800 hover:text-blue-600">
                            <i class="fas fa-map-marker-alt"></i> {{ $event->eventVenue }}
                        </a>
                    </p>
                    <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                    <div class="mt-4 flex w-full">
                        <button 
                            class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600"
                            onclick="toggleBookingForm('{{ $event->_id }}', '{{ $event->eventName }}', '{{ $event->eventVenue }}', {{ $event->ticketPrice }}, '{{ asset('img/' . $event->eventImage) }}', '{{ $event->eventDate }}', '{{ $event->eventTime }}')">
                            Get Tickets
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-1 text-center font-serif text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
        @endforelse
    </div>

    <div id="bookingForm" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-slate-900 bg-opacity-70">
        <div class="flex w-full max-w-5xl overflow-hidden rounded-lg bg-white shadow-xl">
            <div class="w-1/2">
                <img id="eventImage" src="" alt="Event Image" class="h-full w-full object-cover">
            </div>
            <div class="relative w-1/2 bg-slate-900 p-6 text-white">
                <h2 id="eventTitle" class="text-4xl font-bold"></h2>
                <p class="mt-4 text-lg"><span class="font-semibold">📅 Date:</span> <span id="eventDate"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">📍 Venue:</span> <span id="eventVenue"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">⏰ Start:</span> <span id="eventTime"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">Price:</span> LKR <span id="ticketPrice">0</span></p>
                <div class="mt-6 flex items-center gap-4">
                    <button onclick="updateQuantity(-1)" class="rounded bg-gray-200 px-3 py-1 text-black">-</button>
                    <input id="ticketQuantity" type="number" value="1" min="1" readonly class="h-8 w-16 rounded border px-3 text-center text-black">
                    <button onclick="updateQuantity(1)" class="rounded bg-gray-200 px-3 py-1 text-black">+</button>
                </div>
                <p class="mt-4 text-lg"><span class="font-semibold">Total Price:</span> LKR <span id="totalPrice">0</span></p>
                
                <div x-data="{ showModal: false }">
                    <button @click="showModal = true" class="mt-4 w-full rounded bg-green-500 px-4 py-2 text-black transition hover:bg-green-600">
                        Purchase
                    </button>

                    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
                            <h2 class="mb-4 text-lg font-semibold text-black">Tickets Ownership Details</h2>
                            <form action="{{ route('booking.create') }}" method="POST">
                                @csrf
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" class="w-full rounded border px-4 py-2 text-sm" required>
                            
                                <label class="mt-4 block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" name="email" class="w-full rounded border px-4 py-2 text-sm" required>
                            
                                <label class="mt-4 block text-sm font-medium text-gray-700">NIC</label>
                                <input type="text" name="nic" class="w-full rounded border px-4 py-2 text-sm" required>
                            
                                <label class="mt-4 block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone" class="w-full rounded border px-4 py-2 text-sm" required>
                            
                                <input type="hidden" name="event_id" id="hiddenEventId">
                                <input type="hidden" name="ticket_quantity" id="hiddenQuantity">
                            
                                <div class="mt-4 flex justify-between">
                                    <button type="button" @click="showModal = false" class="px-4 py-2 text-sm text-gray-600">Cancel</button>
                                    <button id="submitButton" type="submit" class="rounded bg-black px-4 py-2 text-sm font-bold uppercase text-white">
                                        Proceed to Payment
                                    </button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative w-1/3 bg-yellow-500 p-4">
                <button class="absolute right-2 top-2 text-red-400 hover:text-red-800" onclick="toggleBookingForm()">✖</button>

                <h3 class="mt-6 text-lg font-semibold">Ticket Policy</h3>
                <p class="mb-4 mt-6 text-sm">Only the initial email or SMS from Pearl Princess Events will be accepted as proof of purchase. Tickets will not be redeemed for forwarded or screenshot versions.<br><br> A valid NIC or Passport may be required for redemption.</p>
                
                <div>
                    <div class="absolute bottom-10 left-0 right-0 flex items-center justify-center space-x-1">
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-2 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-2 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-3 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-2 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-3 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-2 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-2 bg-black"></div>
                        <div class="h-8 w-1 bg-black"></div>
                        <div class="h-8 w-3 bg-black"></div>
                    </div>
                    <div class="absolute bottom-4 left-0 right-0 flex items-center justify-center font-mono text-sm">
                        <p>92132774629</p>
                    </div>
                </div>
             </div>
        </div>
    </div>
    
    <script>
function toggleBookingForm(id = null, name = '', venue = '', price = 0, image = '', date = '', time = '') {
    const form = document.getElementById('bookingForm');
    const title = document.getElementById('eventTitle');
    const venueElement = document.getElementById('eventVenue');
    const ticketPriceElement = document.getElementById('ticketPrice');
    const eventImage = document.getElementById('eventImage');
    const totalPrice = document.getElementById('totalPrice');
    const quantity = document.getElementById('ticketQuantity');
    const eventDate = document.getElementById('eventDate');
    const eventTime = document.getElementById('eventTime');
    const hiddenQuantity = document.getElementById('hiddenQuantity');

    document.getElementById('hiddenEventId').value = id;

    if (id) {
        title.innerText = name;
        venueElement.innerText = venue;
        ticketPriceElement.innerText = price.toFixed(2);
        eventImage.src = image;
        eventDate.innerText = date;
        eventTime.innerText = time;
        quantity.value = 1;
        hiddenQuantity.value = 1; // Ensure hidden input is set correctly
        totalPrice.innerText = price.toFixed(2);
        form.classList.remove('hidden');
    } else {
        form.classList.add('hidden');
    }
}


        function updateQuantity(change) {
            const quantity = document.getElementById('ticketQuantity');
            const ticketPrice = parseFloat(document.getElementById('ticketPrice').innerText);
            const totalPrice = document.getElementById('totalPrice');
            const hiddenQuantity = document.getElementById('hiddenQuantity'); // Get the hidden input field

            let currentQuantity = parseInt(quantity.value);
            currentQuantity += change;
            if (currentQuantity < 1) currentQuantity = 1;

            quantity.value = currentQuantity;
            totalPrice.innerText = (currentQuantity * ticketPrice).toFixed(2);
            hiddenQuantity.value = currentQuantity; // Update the hidden input field
        }


        async function handlePayment() {
            const formData = new FormData(document.querySelector('form'));

            try {
                const response = await fetch('{{ route("booking.create") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const result = await response.json();
                if (result.url) {
                    window.location.href = result.url; 
                } else {
                    alert('Payment initiation failed!');
                }
            } catch (error) {
                console.error('Error during payment:', error);
                alert('An error occurred. Please try again.');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection

</body>
    
