<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planning Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-10">
    <button type="button" class="ml-10 rounded bg-green-600 p-2 font-bold text-white hover:bg-green-700"><a href="{{ route('home') }}">Back To Home</a></button>
    <div class="mx-auto max-w-3xl rounded-lg bg-white p-8 shadow-lg">
        <div class="mt-[90px]">
            <h1 class="mb-6 text-2xl font-bold">Event Planning Form</h1>
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="name">Client Name</label>
                    <input type="text" id="name" name="name" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="email">Email</label>
                    <input type="email" id="email" name="email" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="address">Address</label>
                    <input type="text" id="address" name="address" class="w-full rounded border border-gray-300 p-2">
                </div>
                <h2 class="mb-4 mt-6 text-xl font-semibold">Event Details</h2>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="eventType">Event Type</label>
                    <select id="eventType" name="eventType" required class="w-full rounded border border-gray-300 p-2">
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday Party</option>
                        <option value="corporate">Corporate Event</option>
                        <option value="conference">Conference</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="eventDate">Event Date</label>
                    <input type="date" id="eventDate" name="eventDate" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="eventTime">Event Time</label>
                    <input type="time" id="eventTime" name="eventTime" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="location">Location</label>
                    <input type="text" id="location" name="location" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="guestCount">Estimated Number of Guests</label>
                    <input type="number" id="guestCount" name="guestCount" required class="w-full rounded border border-gray-300 p-2">
                </div>
                <h2 class="mb-4 mt-6 text-xl font-semibold">Event Requirements</h2>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="theme">Theme/Style</label>
                    <input type="text" id="theme" name="theme" class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="budget">Budget</label>
                    <input type="number" id="budget" name="budget" class="w-full rounded border border-gray-300 p-2">
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700">Services Required</label>
                    <div class="mb-2 flex items-center">
                        <input type="checkbox" id="venue" name="services[]" value="venue" class="mr-2">
                        <label for="venue">Venue Selection</label>
                    </div>
                    <div class="mb-2 flex items-center">
                        <input type="checkbox" id="catering" name="services[]" value="catering" class="mr-2">
                        <label for="catering">Catering</label>
                    </div>
                    <div class="mb-2 flex items-center">
                        <input type="checkbox" id="decorations" name="services[]" value="decorations" class="mr-2">
                        <label for="decorations">Decorations</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-gray-700" for="notes">Special Requests or Notes</label>
                    <textarea id="notes" name="notes" rows="4" class="w-full rounded border border-gray-300 p-2"></textarea>
                </div>
                <div class="mb-4">
                    <button type="submit" class="w-full rounded bg-blue-600 py-2 font-bold text-white hover:bg-blue-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
