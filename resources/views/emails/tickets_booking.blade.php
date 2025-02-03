<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f9fa;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f8f9fa">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background: #ffffff; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); margin: 20px 0; padding: 20px;">

                    <tr>
                        <td align="center" style="background: #dc2626; padding: 20px; border-radius: 8px 8px 0 0;">
                            <h2 style="color: #ffffff; margin: 0; font-size: 24px;">🎟️ Your Ticket is Confirmed! 🎉</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px; text-align: left;">
                            <p style="font-size: 18px; color: #333; margin: 5px 0;"><strong>Event Name:</strong> {{ $ticket->event->eventName }}</p>
                            <p style="font-size: 18px; color: #333; margin: 5px 0;"><strong>Date:</strong> {{ $ticket->event->eventDate }}</p>
                            <p style="font-size: 18px; color: #333; margin: 5px 0;"><strong>Venue:</strong> {{ $ticket->event->eventVenue }}</p>
                            <p style="font-size: 18px; color: #333; margin: 5px 0;"><strong>Quantity:</strong> {{ $ticket->ticket_quantity }}</p>
                            <p style="font-size: 20px; font-weight: bold; color: #dc2626; margin: 10px 0;"><strong>Total Price:</strong> LKR {{ number_format($ticket->total_price, 2) }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 20px;">
                            <a href="https://maps.google.com?q={{ urlencode($ticket->event->eventVenue) }}"
                                
                               style="background: #007bff; color: #ffffff; text-decoration: none; font-size: 18px; padding: 12px 30px; border-radius: 6px; display: inline-block; font-weight: bold;">
                                📍 View Event Location
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 20px;">
                            <a href="#" style="background: #dc2626; color: #ffffff; text-decoration: none; font-size: 18px; padding: 12px 30px; border-radius: 6px; display: inline-block; font-weight: bold;">
                                🎟️ Enjoy Your Day
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="background: #f1f1f1; padding: 15px; border-radius: 0 0 8px 8px;">
                            <p style="color: #555; font-size: 14px; margin: 0;">Thank you for booking with us! We look forward to seeing you at the event. 🎶✨</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
