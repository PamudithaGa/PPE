<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pearl Princess Events' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Assuming Tailwind CSS is installed -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/myscripts.js') }}" defer></script>
    <Script src="https://cdn.tailwindcss.com"></Script>

    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: '#da373d',
              },
              fontFamily: {
                'just-another-hand': ['"Just Another Hand"', 'cursive'],
                'julius-sans-one': ['"Julius Sans One"', 'sans-serif'],
                'righteous-regular':['"Righteous", sans-serif'],
                'inconsolata': ['"Inconsolata"', 'monospace'],
                'josefin-slab': ['"Josefin Slab"', 'serif'],
                'righteous': ['"Righteous"', 'sans-serif'],
                'k2d': ['"K2D"', 'sans-serif'],
                'lateef': ['"Lateef"', 'serif'],
                },
            },
          },
        };
      </script>
</head>

<body>
    <h1>Thank You For Booking With Us!</h1>
    <p>Hi {{ $booking['name'] }},</p>
    <p>Your booking has been confirmed. Here are the details:</p>
    <ul>
        <li><strong>Event Type:</strong> {{ $booking['eventType'] }}</li>
        <li><strong>Event Date:</strong> {{ $booking['eventDate'] }}</li>
        <li><strong>Event Time:</strong> {{ $booking['eventTime'] }}</li>
        <li><strong>Location:</strong> {{ $booking['location'] }}</li>
        <li><strong>Number of Guests:</strong> {{ $booking['guestCount'] }}</li>
        <li><strong>Special Notes:</strong> {{ $booking['notes'] ?? 'None' }}</li>
    </ul>
    <p>We look forward to making your event special!</p>
    <p>We will cantact you as soon as possible</p>
</body>
</html>
