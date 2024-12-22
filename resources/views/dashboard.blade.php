<x-app-layout>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div class="flex">
            <!-- Sidebar -->
            <div class="fixed h-screen w-1/5 bg-gray-900 shadow-lg">
                <div class="mt-[140px] flex items-center justify-center">
                    <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
                </div>
                <nav class="mt-[40px]">
                    <ul>
                        <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('dashboard') }}">Profile</a></li>
                        <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Address Book</a></li>
                        <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Orders</a></li>
                        <li class="px-6 py-2 text-gray-200 hover:bg-green-700"><a href="{{ route('home') }}">Back To Home</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="ml-[400px] mt-[20px] grid grid-cols-2 gap-4 pr-[10px]">
            <div class="rounded-lg bg-white p-4 shadow">
                <h3 class="font-serif text-[24px] font-semibold text-black">Profile</h3>
                <div><h2 class="mb-2 font-serif font-semibold text-gray-600">Name: {{ auth()->user()->name }}</h2></div>
                <div><h2 class="mb-2 font-serif font-semibold text-gray-600">Email: {{ auth()->user()->email }}</h2></div>
                <div><h2 class="mb-2 font-serif font-semibold text-gray-600">Phone Number: {{ auth()->user()->phone }}</h2></div>
                <button class="mt-4 rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
                    Update profile
                </button>
            </div>
            <div class="rounded-lg bg-white p-4 shadow">
                <h3 class="font-serif text-[24px] font-semibold text-black">Address Book</h3>
            </div>
        </div>
                    
        <div class="ml-[400px] mt-[20px] gap-6 rounded-lg bg-white p-6 pr-[30px] shadow">
            <h3 class="font-serif text-[24px] font-semibold text-black">Bookings</h3>
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
        </div>
        
        <div class="ml-[400px] mt-8 rounded-lg bg-white p-6 pr-[10px] shadow">
            <h2 class="text-2xl font-bold text-gray-700">My Tickets</h2>
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
    </body>
</x-app-layout>
