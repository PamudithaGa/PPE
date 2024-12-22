{{-- booking_confirmation.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pearl Princess Events' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Assuming Tailwind CSS is installed -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/myscripts.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                primary: '#da373d',
                accent: '#ffbf47',
              },
              fontFamily: {
                'body': ['"Josefin Slab"', 'serif'],
                'header': ['"Righteous"', 'sans-serif'],
              },
            },
          },
        };
    </script>
</head>
<body class="font-body bg-gray-50 p-6 text-gray-800">
    <div class="mx-auto max-w-2xl overflow-hidden rounded-lg bg-white shadow-lg">
        <header class="bg-primary py-4 text-center text-white">
            <h1 class="font-header text-2xl">Thank You for Booking with Pearl Princess Events!</h1>
        </header>
        <div class="p-6">
            <p class="mb-4 text-lg">Hi <span class="font-semibold">{{ $booking['name'] }}</span>,</p>
            <p class="mb-4">We’re excited to help make your event special! Here are the details of your booking:</p>
            <ul class="mb-6 space-y-2">
                <li><strong>Event Type:</strong> {{ $booking['eventType'] }}</li>
                <li><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($booking['eventDate'])->format('F j, Y') }}</li>
                <li><strong>Event Time:</strong> {{ $booking['eventTime'] }}</li>
                <li><strong>Location:</strong> {{ $booking['location'] }}</li>
                <li><strong>Number of Guests:</strong> {{ $booking['guestCount'] }}</li>
                <li><strong>Special Notes:</strong> {{ $booking['notes'] ?? 'None' }}</li>
            </ul>
            <p class="mb-4">If you have any questions or need to make changes to your booking, please feel free to contact us.</p>
            <p class="text-primary font-semibold">We will contact you as soon as possible to finalize the arrangements!</p>
        </div>
        <footer class="bg-gray-100 py-4 text-center">
            <p class="text-sm text-gray-600">© {{ date('Y') }} Pearl Princess Events. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
