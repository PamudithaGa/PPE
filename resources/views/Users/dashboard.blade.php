{{-- <body class="bg-gray-100 font-sans leading-normal tracking-normal">
    
    <nav class="bg-blue-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-lg font-bold text-white">Pearl Princess Events</div>
            <div>
                <a href="#" class="mx-2 text-gray-300 hover:text-white">Home</a>
                <a href="#" class="mx-2 text-gray-300 hover:text-white">Profile</a>
                
                <button wire:click="logout" class="w-full text-start">
                    <x-dropdown-link>
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </button>
++            </div>
        </div>
    </nav>

            <div class="mb-8 rounded-lg bg-white p-6 shadow">
                <h2 class="text-2xl font-bold text-gray-700">Welcome, {{ auth()->user()->name }}</h2>
                <p class="text-gray-500">NIC: {{ auth()->user()->nic ?? '123456789V' }}</p>
                <p class="text-gray-500">Email: {{ auth()->user()->email }}</p>
            </div>


        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            
            <div class="rounded-lg bg-white p-4 shadow">
                <h3 class="text-lg font-semibold text-gray-800">Upcoming Event 1</h3>
                <p class="text-gray-600">Date: 2024-12-25</p>
                <p class="text-gray-600">Venue: Grand Ballroom</p>
                <button class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    View Details
                </button>
            </div>
            
            <div class="rounded-lg bg-white p-4 shadow">
                <h3 class="text-lg font-semibold text-gray-800">Upcoming Event 2</h3>
                <p class="text-gray-600">Date: 2025-01-15</p>
                <p class="text-gray-600">Venue: Lakeview Gardens</p>
                <button class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    View Details
                </button>
            </div>
        </div>


        <div class="mt-8 rounded-lg bg-white p-6 shadow">
            <h2 class="text-2xl font-bold text-gray-700">Your Tickets</h2>
            <table class="mt-4 w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Event</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Amount</th>
                        <th class="px-4 py-2 text-left">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">Event Name 1</td>
                        <td class="border px-4 py-2">2024-12-25</td>
                        <td class="border px-4 py-2">LKR 5000</td>
                        <td class="border px-4 py-2">2</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Event Name 2</td>
                        <td class="border px-4 py-2">2025-01-15</td>
                        <td class="border px-4 py-2">LKR 7500</td>
                        <td class="border px-4 py-2">5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> --}}



<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navigation Bar -->
    <nav class="bg-blue-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-lg font-bold text-white">Pearl Princess Events</div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Home</a>
                <a href="#" class="text-gray-300 hover:text-white">Profile</a>
                <!-- Logout Button -->
                <button wire:click="logout" class="rounded px-4 py-2 text-sm font-medium text-gray-300 hover:bg-blue-700 hover:text-white">
                    {{ __('Log Out') }}
                </button>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mx-auto mt-8 px-4">
        <!-- User Details -->
        <div class="mb-8 rounded-lg bg-white p-6 shadow">
            <h2 class="text-2xl font-bold text-gray-700">Welcome, {{ auth()->user()->name }}</h2>
            <p class="text-gray-500">NIC: {{ auth()->user()->nic ?? '123456789V' }}</p>
            <p class="text-gray-500">Email: {{ auth()->user()->email }}</p>
        </div>

        <!-- Upcoming Events -->
        <h2 class="mb-4 text-2xl font-bold text-gray-700">Upcoming Events</h2>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Event Card -->
            @foreach ($upcomingEvents as $event)
                <div class="rounded-lg bg-white p-4 shadow">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $event->title }}</h3>
                    <p class="text-gray-600">Date: {{ $event->date }}</p>
                    <p class="text-gray-600">Venue: {{ $event->venue }}</p>
                    <button class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                        View Details
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Purchased Tickets -->
        <div class="mt-8 rounded-lg bg-white p-6 shadow">
            <h2 class="text-2xl font-bold text-gray-700">Your Tickets</h2>
            <table class="mt-4 w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="border-b px-4 py-2 text-left">Event</th>
                        <th class="border-b px-4 py-2 text-left">Date</th>
                        <th class="border-b px-4 py-2 text-left">Amount</th>
                        <th class="border-b px-4 py-2 text-left">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchasedTickets as $ticket)
                        <tr>
                            <td class="border-b px-4 py-2">{{ $ticket->event_name }}</td>
                            <td class="border-b px-4 py-2">{{ $ticket->event_date }}</td>
                            <td class="border-b px-4 py-2">LKR {{ number_format($ticket->amount, 2) }}</td>
                            <td class="border-b px-4 py-2">{{ $ticket->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
