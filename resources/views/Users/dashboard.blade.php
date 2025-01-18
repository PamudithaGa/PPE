<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navigation Bar -->
    <nav class="bg-blue-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-lg font-bold text-white">Pearl Princess Events</div>
            <div>
                <a href="#" class="mx-2 text-gray-300 hover:text-white">Home</a>
                <a href="#" class="mx-2 text-gray-300 hover:text-white">Profile</a>
                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-dropdown-link>
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </button>
                {{-- <a href="#" class="mx-2 text-gray-300 hover:text-white">Logout</a> --}}
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
            <!-- User Details -->
            <div class="mb-8 rounded-lg bg-white p-6 shadow">
                <h2 class="text-2xl font-bold text-gray-700">Welcome, {{ auth()->user()->name }}</h2>
                <p class="text-gray-500">NIC: {{ auth()->user()->nic ?? '123456789V' }}</p>
                <p class="text-gray-500">Email: {{ auth()->user()->email }}</p>
            </div>

        <!-- Upcoming Events -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Event Card -->
            <div class="rounded-lg bg-white p-4 shadow">
                <h3 class="text-lg font-semibold text-gray-800">Upcoming Event 1</h3>
                <p class="text-gray-600">Date: 2024-12-25</p>
                <p class="text-gray-600">Venue: Grand Ballroom</p>
                <button class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    View Details
                </button>
            </div>
            <!-- Event Card -->
            <div class="rounded-lg bg-white p-4 shadow">
                <h3 class="text-lg font-semibold text-gray-800">Upcoming Event 2</h3>
                <p class="text-gray-600">Date: 2025-01-15</p>
                <p class="text-gray-600">Venue: Lakeview Gardens</p>
                <button class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    View Details
                </button>
            </div>
        </div>

        <!-- Purchased Tickets -->
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
</html>
