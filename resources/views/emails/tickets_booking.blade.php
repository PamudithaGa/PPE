<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
</head>
<body>
    <h2>Your Ticket for {{ $ticket->event->eventName }} is confirmed!</h2>
    <p><strong>Event Name:</strong> {{ $ticket->event->eventName }}</p>
    <p><strong>Date:</strong> {{ $ticket->event->eventDate }}</p>
    <p><strong>Venue:</strong> {{ $ticket->event->eventVenue }}</p>
    <p><strong>Quantity:</strong> {{ $ticket->ticket_quantity }}</p>
    <p><strong>Total Price:</strong> LKR {{ number_format($ticket->total_price, 2) }}</p>
    <p>Thank you for booking your tickets with us!</p>
</body>
</html>
