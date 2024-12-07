@extends('layout')

@section('content')

<body class="m-0">
    <div class="grid grid-cols-1 gap-8 p-6 sm:grid-cols-2 lg:grid-cols-4">
        @forelse($events as $event)
            <div class="group relative mt-[70px] flex flex-col overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 hover:shadow-2xl">
                <div class="h-64 w-full">
                    <img 
                        class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110" 
                        src="{{ asset('img/' . $event->eventImage) }}" 
                        alt="Event Image" 
                    />
                </div>
                
                <div class="p-6 text-gray-800">
                    <h3 class="mb-2 text-xl font-semibold transition-colors duration-300 group-hover:text-blue-500">{{ $event->eventName }}</h3>
                    <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Date:</span> {{ $event->eventDate }}</p>
                    <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Venue:</span> {{ $event->eventVenue }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                    
                    <div class="mt-4 flex space-x-3">
                        <a href="{{ route('events.edit', $event->_id) }}" class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600">
                            Get Tickets 
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-1 text-center text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
        @endforelse
    </div>
</body>

@endsection
