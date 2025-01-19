{{-- @extends('layout')

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
                        <span class="font-semibold">Venue:  </span> 
                        <a href="https://maps.google.com?q={{ urlencode($event->eventVenue) }}" target="_blank" class="text-gray-800 hover:text-blue-600">
                            <i class="fas fa-map-marker-alt"><p class=""> {{ $event->eventVenue }} </p></i>
                        </a>
                    </p>
                    <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>

                    <div class="mt-4 flex w-full">
                        <button 
                            class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600"
                            onclick="toggleBookingForm('{{ $event->_id }}', '{{ $event->eventName }}', '{{ $event->eventVenue }}', {{ $event->ticketPrice }}, '{{ asset('img/' . $event->eventImage) }}')"
                        >
                            Get Tickets
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="font-center col-span-1 font-serif text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
        @endforelse
    </div> --}}

    {{-- <!-- Ticket Booking Modal -->
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
                <img id="eventImage" class="h-full w-full object-contain" src="" alt="Event Image" />
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
Only the initial email or SMS provided by Pearl Princess Events will be accepted as proof of purchase. Tickets will not be redeemed for any forwarded or screenshots. Valid NIC or Passport may be required if needed during redemption.
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
        </div> --}}


        <!-- Ticket Booking Modal -->
{{-- <div id="bookingForm" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
    <div class="flex w-full max-w-5xl overflow-hidden rounded-lg bg-white shadow-xl"> --}}
        <!-- Image Section -->
        {{-- <div class="w-1/2">
            <img id="eventImage" src="" alt="Event Image" class="h-full w-full object-cover">
        </div>

        <!-- Event Details Section -->
        <div class="relative w-1/2 bg-black p-6 text-white">
            <button 
                class="absolute right-4 top-4 text-gray-400 hover:text-red-500"
                onclick="toggleBookingForm()"
            >
                ✖
            </button>
            
            <h2 id="eventTitle" class="text-4xl font-bold tracking-wider text-white"></h2>

            <div class="mt-6 border border-white p-4">
                <div class="flex justify-between">
                    <span id="eventDate">📅 27 May</span>
                    <span id="eventVenue">🎤 Fauget Studio</span>
                </div>
                <div class="mt-3 flex justify-between">
                    <span id="eventTime">⏰ 16.00 - 18.00</span>
                    <span id="eventLocation">📍 123 Anywhere St., Any City</span>
                </div>
            </div>

            <div class="mt-6 flex items-center bg-yellow-500 p-4 text-black">
                <div class="flex-grow">
                    <p class="text-xs">Ticket No: <span id="ticketNumber">0123456789</span></p>
                    <div class="mt-2 h-10 w-full bg-black"></div>
                </div>
                <div class="ml-4 text-right">
                    <p class="text-xs">Level</p>
                    <p class="text-lg font-bold" id="ticketLevel">2F</p>
                    
                    <p class="mt-2 text-xs">Sec</p>
                    <p class="text-lg font-bold" id="ticketSection">G</p>

                    <p class="mt-2 text-xs">Row</p>
                    <p class="text-lg font-bold" id="ticketRow">10</p>

                    <p class="mt-2 text-xs">Seat</p>
                    <p class="text-lg font-bold" id="ticketSeat">25</p>
                </div>
            </div>

            <!-- Ticket Quantity & Purchase Button -->
            <div class="mt-6 flex items-center gap-4">
                <button onclick="updateQuantity(-1)" class="rounded bg-gray-200 px-3 py-1 text-black">-</button>
                <input id="ticketQuantity" type="number" value="1" min="1" readonly class="w-16 rounded border px-2 text-center text-black">
                <button onclick="updateQuantity(1)" class="rounded bg-gray-200 px-3 py-1 text-black">+</button>
            </div>

            <p class="mt-4 text-lg">
                <span class="font-semibold">Total Price:</span> LKR <span id="totalPrice">0</span>
            </p>

            <button 
                onclick="showPaymentGateway()"
                class="mt-4 w-full rounded bg-green-500 px-4 py-2 text-white transition hover:bg-green-600"
            >
                Purchase
            </button>
        </div>
    </div>
</div>


         --}}
        {{-- <div class="flex w-full max-w-5xl overflow-hidden rounded-lg bg-white shadow-xl">
        

        <div class="w-1/2">
            <img src="../img/402047860_802170211919336_1888033966618381733_n.jpg" alt="Music Festival" class="h-full w-full object-cover">
        </div>


        <div class="relative w-1/2 bg-black p-6 text-white">
            
            <h2 class="text-4xl font-bold tracking-wider text-white">MUSIC <br> FESTIVAL</h2>

            <div class="mt-6 border border-white p-4">
                <div class="flex justify-between">
                    <span>📅 27 May</span>
                    <span>🎤 Fauget Studio</span>
                </div>
                <div class="mt-3 flex justify-between">
                    <span>⏰ 16.00 - 18.00</span>
                    <span>📍 123 Anywhere St., Any City</span>
                </div>
            </div>

            <div class="mt-6 flex items-center bg-yellow-500 p-4 text-black">
                
                <div class="flex-grow">
                    <p class="text-xs">Ticket No: 0123456789</p>
                    <div class="mt-2 h-10 w-full bg-black"></div>
                </div>

                <div class="ml-4 text-right">
                    <p class="text-xs">Level</p>
                    <p class="text-lg font-bold">2F</p>
                    
                    <p class="mt-2 text-xs">Sec</p>
                    <p class="text-lg font-bold">G</p>

                    <p class="mt-2 text-xs">Row</p>
                    <p class="text-lg font-bold">10</p>

                    <p class="mt-2 text-xs">Seat</p>
                    <p class="text-lg font-bold">25</p>
                </div>
            </div>
        </div>

    </div>
 --}}

    {{-- </div>

    <script>
        function toggleBookingForm(id, name, venue, price, image = '') {
            const form = document.getElementById('bookingForm');
            const title = document.getElementById('eventTitle');
            const venueElement = document.getElementById('eventVenue');
            const ticketPrice = document.getElementById('ticketPrice');
            const eventImage = document.getElementById('eventImage');
            const quantity = document.getElementById('ticketQuantity');
            const totalPrice = document.getElementById('totalPrice');

            if (id) {
                title.innerText = name;
                venueElement.innerHTML = `<a href="https://maps.google.com?q=${encodeURIComponent(venue)}" target="_blank" class="text-gray-800 hover:text-blue-600"><i class='fas fa-map-marker-alt'></i> Venue: ${venue}</a>`;
                ticketPrice.innerText = price.toFixed(2);
                eventImage.src = image;
                quantity.value = 1;
                totalPrice.innerText = price.toFixed(2);
                form.classList.remove('hidden');
            } else {
                form.classList.add('hidden');
            }
        }

        function updateQuantity(amount) {
            const quantity = document.getElementById('ticketQuantity');
            const ticketPrice = parseFloat(document.getElementById('ticketPrice').innerText);
            const totalPrice = document.getElementById('totalPrice');

            let currentQuantity = parseInt(quantity.value);
            currentQuantity = Math.max(1, currentQuantity + amount);
            quantity.value = currentQuantity;
            totalPrice.innerText = (currentQuantity * ticketPrice).toFixed(2);
        }

        function showPaymentGateway() {
            alert('Redirecting to payment gateway...');
            
        }
    </script>
</body>
@endsection --}}



{{-- @extends('layout')

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
                        <span class="font-semibold">Venue:  </span> 
                        <a href="https://maps.google.com?q={{ urlencode($event->eventVenue) }}" target="_blank" class="text-gray-800 hover:text-blue-600">
                            <i class="fas fa-map-marker-alt"></i> {{ $event->eventVenue }}
                        </a>
                    </p>
                    <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                    <div class="mt-4 flex w-full">
                        <button 
                            class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600"
                            onclick="toggleBookingForm('{{ $event->_id }}', '{{ $event->eventName }}', '{{ $event->eventVenue }}', {{ $event->ticketPrice }}, '{{ asset('img/' . $event->eventImage) }}')"
                        >
                            Get Tickets
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-1 text-center font-serif text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
        @endforelse
    </div>

    <!-- Ticket Booking Modal -->
    <div id="bookingForm" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-slate-900 bg-opacity-50">
        <div class="flex w-full max-w-5xl overflow-hidden rounded-lg bg-white shadow-xl">
            <div class="w-1/2">
                <img id="eventImage" src="" alt="Event Image" class="h-full w-full object-cover">
            </div>
            <div class="relative w-1/2 bg-slate-900 p-6 text-white">
                <h2 id="eventTitle" class="text-4xl font-bold tracking-wider"></h2>
                <p class="mt-4 text-lg"><span class="font-semibold">📅 Date:</span> <span id="eventDate"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">📍 Venue:</span> <span id="eventVenue"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">⏰ Start:</span> <span id="eventTime"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">Price:</span> LKR <span id="ticketPrice">0</span></p>
                <div class="mt-6 flex items-center gap-4">
                    <button onclick="updateQuantity(-1)" class="rounded bg-gray-200 px-3 py-1 text-black">-</button>
                    <input id="ticketQuantity" type="number" value="1" min="1" readonly class="w-16 rounded border px-2 text-center text-black">
                    <button onclick="updateQuantity(1)" class="rounded bg-gray-200 px-3 py-1 text-black">+</button>
                </div>
                <p class="mt-4 text-lg"><span class="font-semibold">Total Price:</span> LKR <span id="totalPrice">0</span></p>
                <button onclick="showPaymentGateway()" class="mt-4 w-full rounded bg-green-500 px-4 py-2 text-white transition hover:bg-green-600">Purchase</button>
            </div>
            <div class="w-1/3 bg-yellow-500">
                <button class="absolute right-1 text-gray-400 hover:text-red-500" onclick="toggleBookingForm()">✖</button>
            </div>
        </div>
    </div>

    <script>
        function toggleBookingForm(id = null, name = '', venue = '', price = 0, image = '') {
            const form = document.getElementById('bookingForm');
            const title = document.getElementById('eventTitle');
            const venueElement = document.getElementById('eventVenue');
            const ticketPriceElement = document.getElementById('ticketPrice');
            const eventImage = document.getElementById('eventImage');
            const totalPrice = document.getElementById('totalPrice');
            const quantity = document.getElementById('ticketQuantity');

            if (!form || !title || !venueElement || !ticketPriceElement || !eventImage || !totalPrice || !quantity) {
                console.error("One or more required elements are missing.");
                return;
            }

            if (id) {
                title.innerText = name;
                venueElement.innerText = venue;
                ticketPriceElement.innerText = price.toFixed(2);
                eventImage.src = image;
                quantity.value = 1;
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
            let currentQuantity = parseInt(quantity.value);
            currentQuantity += change;
            if (currentQuantity < 1) currentQuantity = 1;
            quantity.value = currentQuantity;
            totalPrice.innerText = (currentQuantity * ticketPrice).toFixed(2);
        }
    </script>
</body>
@endsection --}}

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
                        <span class="font-semibold">Venue:  </span> 
                        <a href="https://maps.google.com?q={{ urlencode($event->eventVenue) }}" target="_blank" class="text-gray-800 hover:text-blue-600">
                            <i class="fas fa-map-marker-alt"></i> {{ $event->eventVenue }}
                        </a>
                    </p>
                    <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                    <div class="mt-4 flex w-full">
                        <button 
                            class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600"
                            onclick="toggleBookingForm('{{ $event->_id }}', '{{ $event->eventName }}', '{{ $event->eventVenue }}', {{ $event->ticketPrice }}, '{{ asset('img/' . $event->eventImage) }}', '{{ $event->eventDate }}', '{{ $event->eventTime }}')"
                        >
                            Get Tickets
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-1 text-center font-serif text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
        @endforelse
    </div>

    <!-- Ticket Booking Modal -->
    <div id="bookingForm" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-slate-900 bg-opacity-70">
        <div class="flex w-full max-w-5xl overflow-hidden rounded-lg bg-white shadow-xl">
            <div class="w-1/2">
                <img id="eventImage" src="" alt="Event Image" class="h-full w-full object-cover">
            </div>
            <div class="relative w-1/2 border-r-4 border-dotted border-white bg-slate-900 p-6 text-white">
                <h2 id="eventTitle" class="text-4xl font-bold tracking-wider"></h2>
                <p class="mt-4 text-lg"><span class="font-semibold">📅 Date:</span> <span id="eventDate"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">📍 Venue:</span> <span id="eventVenue"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">⏰ Start:</span> <span id="eventTime"></span></p>
                <p class="mt-4 text-lg"><span class="font-semibold">Price:</span> LKR <span id="ticketPrice">0</span></p>
                <div class="mt-6 flex items-center gap-4">
                    <button onclick="updateQuantity(-1)" class="rounded bg-gray-200 px-3 py-1 text-black">-</button>
                    <input id="ticketQuantity" type="number" value="1" min="1" readonly class="w-16 rounded border px-2 text-center text-black">
                    <button onclick="updateQuantity(1)" class="rounded bg-gray-200 px-3 py-1 text-black">+</button>
                </div>
                <p class="mt-4 text-lg"><span class="font-semibold">Total Price:</span> LKR <span id="totalPrice">0</span></p>
                <button onclick="showPaymentGateway()" class="mt-4 w-full rounded bg-green-500 px-4 py-2 text-white transition hover:bg-green-600">Purchase</button>
            </div>
            <div class="relative w-1/3 bg-yellow-500 p-4">
                <button class="absolute right-2 top-2 text-red-400 hover:text-red-800" onclick="toggleBookingForm()">✖</button>

                <h3 class="mt-6 text-lg font-semibold">Ticket Policy</h3>
                <p class="mb-4 mt-6 text-sm">Only the initial email or SMS from Pearl Princess Events will be accepted as proof of purchase. Tickets will not be redeemed for forwarded or screenshot versions.<br><br> A valid NIC or Passport may be required for redemption.</p>
                
                <div class="absolute bottom-6 left-0 right-0 flex items-center justify-center space-x-1">
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

            if (!form || !title || !venueElement || !ticketPriceElement || !eventImage || !totalPrice || !quantity || !eventDate || !eventTime) {
                console.error("One or more required elements are missing.");
                return;
            }

            if (id) {
                title.innerText = name;
                venueElement.innerText = venue;
                ticketPriceElement.innerText = price.toFixed(2);
                eventImage.src = image;
                eventDate.innerText = date;
                eventTime.innerText = time;
                quantity.value = 1;
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
            let currentQuantity = parseInt(quantity.value);
            currentQuantity += change;
            if (currentQuantity < 1) currentQuantity = 1;
            quantity.value = currentQuantity;
            totalPrice.innerText = (currentQuantity * ticketPrice).toFixed(2);
        }
    </script>

</body>
@endsection
