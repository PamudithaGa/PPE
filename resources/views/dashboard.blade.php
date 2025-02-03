<x-app-layout>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="w-64 bg-gray-900 text-white shadow-lg">
                <div class="mt-12 flex flex-col items-center">
                    <img class="h-16 w-16 rounded-full border-2 border-white" 
                         src="https://via.placeholder.com/150" 
                         alt="{{ auth()->user()->name }} Profile Picture">
                    <h3 class="mt-4 text-lg font-bold"> {{ auth()->user()->name }}</h3>
                </div>

                <nav class="mt-10">
                    <ul>
                        <li class="group px-6 py-3 hover:bg-gray-700">
                            <a href="{{ route('dashboard') }}" class="flex items-center">
                                <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                                <span class="ml-4">Profile</span>
                            </a>
                        </li>
                        <li class="group px-6 py-3 hover:bg-green-700">
                            <a href="{{ route('home') }}" class="flex items-center">
                                <i class="fa-solid fa-right-to-bracket fa-flip-horizontal" style="color: #ffffff;"></i>
                                <span class="ml-4">Back to Home</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="flex-1 p-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                   
                    <div class="rounded-lg bg-white p-6 shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-800">Profile</h3>
                        <p class="mt-2 text-gray-600"><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p class="mt-1 text-gray-600"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <a href="{{ route('profile') }}">
                            <button class="mt-4 w-full rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
                                Update Profile
                            </button>
                        </a>
                    </div>
                </div>
            
                <div class="mt-6 w-full">
                    <a href="{{ route('offerings') }}">
                        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-red-500 to-red-700 p-6 shadow-lg hover:scale-90">
                            <div class="absolute right-2 top-2 text-6xl text-white opacity-20">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <p class="text-xl font-bold text-white">🛒 Back To Shop</p>
                        </div>
                    </a>
                </div>

                <div class="mt-6 w-full">
                    <a href="{{ route('eventPage') }}">
                        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 p-6 shadow-lg hover:scale-90">
                            <div class="absolute right-2 top-2 text-6xl text-white opacity-20">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Ticket Purchase</h3>
                            <p class="text-xl font-bold text-white">🎟️ Buy Tickets</p>
                        </div>
                    </a>
                
                
                <div class="grid gap-2 lg:grid-cols-2">
                <div class="mt-6 w-full">
                    <a href="{{ route('bookings.store') }}">
                        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-purple-500 to-indigo-700 p-6 shadow-lg hover:scale-90">
                            <div class="absolute right-2 top-2 text-6xl text-white opacity-20">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Event Planning</h3>
                            <p class="text-xl font-bold text-white">📅 Plan Your Event</p>
                            <p class="mt-2 text-sm text-white opacity-80">Organize, schedule, and manage events effortlessly.</p>
                        </div>
                    </a>
                </div>
            
                <div class="mt-6 w-full">
                    <a href="{{ route('bookings.store') }}">
                        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-pink-500 to-red-600 p-6 shadow-lg hover:scale-90">
                            <div class="absolute right-2 top-2 text-6xl text-white opacity-20">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Manage Participants</h3>
                            <p class="text-xl font-bold text-white">👥 Invite and Track Guests</p>
                            <p class="mt-2 text-sm text-white opacity-80">Invite guests and manage your event's participants.</p>
                        </div>
                    </a>
                </div>
            </div>

                
                <div class="mt-6 w-full">
                    <a href="{{ route('bookings.store') }}">
                        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-yellow-500 to-orange-600 p-6 shadow-lg hover:scale-90">
                            <div class="absolute right-2 top-2 text-6xl text-white opacity-20">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Budget Management</h3>
                            <p class="text-xl font-bold text-white">💸 Manage Event Budgets</p>
                            <p class="mt-2 text-sm text-white opacity-80">Set budgets and track your spending for the event.</p>
                        </div>
                    </a>
                </div>
                
                
            </div>
            <script src="https://kit.fontawesome.com/ee10af8ca1.js" crossorigin="anonymous"></script>
    </body>
</x-app-layout>
