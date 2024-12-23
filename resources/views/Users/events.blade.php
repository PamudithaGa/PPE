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

    
    
</body>

@endsection
