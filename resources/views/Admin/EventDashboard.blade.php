<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Event Dashboard' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Assuming Tailwind CSS is installed -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/myscripts.js') }}" defer></script>
    <Script src="https://cdn.tailwindcss.com"></Script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <div class="fixed h-screen w-1/5 bg-gray-900 shadow-lg">
            <div class="mt-[140px] flex items-center justify-center">
                <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
            </div>
            <nav class="mt-[40px]">
                <ul>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Dashboard</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Users</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('ProductDashboard') }}">Product Management Dashboard</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('EventDashboard') }}">Event Management Dashboard</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Orders</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="ml-[330px] w-4/5 bg-gray-100 p-8">
            <header class="mb-1 mt-[30px] flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
                <h1 class="text-2xl font-bold text-gray-700">Event Management Dashboard</h1>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-700">Welcome, Admin</span>
                    <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
                </div>
            </header>

            <div class="mb-6 rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Manage Events</h2>
        
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
                    @csrf
                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Add Event</h3>
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <input type="text" id="eventName" name="eventName" class="w-full rounded border px-3 py-2" placeholder="Event Name" required>
                
                        <select id="eventType" name="eventType" class="w-full rounded border px-3 py-2" required>
                            <option value="" selected disabled>Select Event Type</option>
                            <option value="musical">Musical Show</option>
                            <option value="dancing">Dancing Show</option>
                            <option value="conference">Conference</option>
                            <option value="workshop">Workshop</option>
                        </select>
                
                        <input type="number" id="ticketPrice" name="ticketPrice" class="w-full rounded border px-3 py-2" placeholder="Ticket Price" required>
                        <input type="date" id="eventDate" name="eventDate" class="w-full rounded border px-3 py-2" required>
                
                        <div>
                            <label for="eventTime" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="time" id="eventTime" name="eventTime" class="w-full rounded border px-3 py-2" required>
                        </div>
                        <div>
                            <label for="endTime" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="time" id="endTime" name="endTime" class="w-full rounded border px-3 py-2" required>
                        </div>
                
                        <input type="text" id="eventVenue" name="eventVenue" placeholder="Venue" class="w-full rounded border px-3 py-2" required>
                        <textarea name="eventDescription" class="w-full rounded border px-3 py-2" placeholder="Event Description" required></textarea>
                
                        <div id="artistsSection" class="mb-6">
                            <div id="artistFields" class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <input type="text" name="artists[]" placeholder="Artist Name" class="w-full rounded border px-3 py-2">
                                    <button type="button" class="add-artist inline-flex items-center rounded-md bg-green-500 px-3 py-1.5 text-white hover:bg-green-600">+</button>
                                </div>
                            </div>
                        </div>
                
                        <input type="file" name="eventImage" class="w-full rounded border px-3 py-2" required>
                    </div>
                    <p class="border-1 py-1 text-[18px] font-bold text-red-600">Important: When Adding An Event, It Must Be 10 Days After The Date Of Adding The Event.</p>
                    <button class="rounded bg-green-500 px-4 py-2 text-white" type="submit">Add Event</button>
                </form>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <h3 class="mb-6 text-xl font-semibold text-gray-800">Events List</h3>
            
                <div class="grid grid-cols-1 gap-8 p-6 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($events as $event)
                    <div class="group relative flex flex-col overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 hover:shadow-2xl">
                        <!-- Event Image -->
                        <div class="h-64 w-full">
                            <img class="object-cove h-full w-full" src="{{ asset('img/' . $event->eventImage) }}" alt="Event Image"/>
                        </div>
                
                        <!-- Event Details -->
                        <div class="p-6 text-gray-800">
                            <h3 class="mb-2 text-xl font-semibold transition-colors duration-300 group-hover:text-blue-500">{{ $event->eventName }}</h3>
                            <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Date:</span> {{ $event->eventDate }}</p>
                            <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Venue:</span> {{ $event->eventVenue }}</p>
                            <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                
                            <div class="mt-4 flex space-x-3">
                                <!-- Update Button -->
                                <a href="{{ route('events.edit', $event->_id) }}" class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600">
                                    Update
                                </a>
                
                                <!-- Delete Button -->
                                <form action="{{ route('events.destroy', $event->_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-red-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-1 text-center text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
                    @endforelse
                </div>
                
            </div>
            
        </div>
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const eventType = document.getElementById('eventType');
            const artistsSection = document.getElementById('artistsSection');
            const artistFields = document.getElementById('artistFields');
            const eventDate = document.getElementById('eventDate');
    
            // Set the minimum date (10 days from today)
            const today = new Date();
            const minDate = new Date();
            minDate.setDate(today.getDate() + 10); // Add 10 days
    
            const minDateString = minDate.toISOString().split('T')[0]; // Convert to yyyy-mm-dd format
            eventDate.min = minDateString;
    
            // Show or hide the "Artists" section based on the event type
            eventType.addEventListener('change', () => {
                const selectedType = eventType.value;
                if (selectedType === 'musical' || selectedType === 'dancing') {
                    artistsSection.classList.remove('hidden');
                } else {
                    artistsSection.classList.add('hidden');
                    // Clear artist fields if "Artists" section is hidden
                    artistFields.innerHTML = `
                        <div class="flex items-center space-x-4">
                            <input type="text" name="artists[]" placeholder="Enter artist name"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <button type="button"
                                class="add-artist inline-flex items-center rounded-md bg-green-500 px-3 py-1.5 text-white hover:bg-green-600">
                                +
                            </button>
                        </div>
                    `;
                }
            });
    
            // Add new artist field dynamically
            artistFields.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('add-artist')) {
                    const artistField = document.createElement('div');
                    artistField.className = 'flex items-center space-x-4';
                    artistField.innerHTML = `
                        <input type="text" name="artists[]" placeholder="Artist Name"
                            class="w-full rounded border px-3 py-2">
                        <button type="button"
                            class="remove-artist inline-flex items-center rounded-md bg-red-500 px-3 py-1.5 text-white hover:bg-red-600">
                            -
                        </button>
                    `;
                    artistFields.appendChild(artistField);
                }
            });
    
            // Remove artist field
            artistFields.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('remove-artist')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>

    
</body>
