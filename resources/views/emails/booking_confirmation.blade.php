
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pearl Princess Events' }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; margin: 0; color: #333;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f8f9fa">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background: #ffffff; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); margin: 20px 0; padding: 20px;">

                    <tr>
                        <td align="center" style="background: #da373d; padding: 20px; border-radius: 8px 8px 0 0;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Thank You for Booking with Pearl Princess Events! 🎉</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px; text-align: left;">
                            <p style="font-size: 18px; margin-bottom: 10px;">Hi <strong>{{ $booking['name'] }}</strong>,</p>
                            <p style="font-size: 16px; margin-bottom: 10px;">We’re excited to help make your event special! Here are the details of your booking:</p>

                            <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                                <tr>
                                    <td style="padding: 8px;"><strong>Event Type:</strong></td>
                                    <td style="padding: 8px;">{{ $booking['eventType'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px;"><strong>Event Date:</strong></td>
                                    <td style="padding: 8px;">{{ \Carbon\Carbon::parse($booking['eventDate'])->format('F j, Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px;"><strong>Event Time:</strong></td>
                                    <td style="padding: 8px;">{{ $booking['eventTime'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px;"><strong>Location:</strong></td>
                                    <td style="padding: 8px;">{{ $booking['location'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px;"><strong>Number of Guests:</strong></td>
                                    <td style="padding: 8px;">{{ $booking['guestCount'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px;"><strong>Special Notes:</strong></td>
                                    <td style="padding: 8px;">{{ $booking['notes'] ?? 'None' }}</td>
                                </tr>
                            </table>

                            <p style="margin-bottom: 10px;">
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($booking['location']) }}" 
                                   style="background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; display: inline-block;">
                                    📍 View Location on Google Maps
                                </a>
                            </p>

                            <p style="font-size: 16px; margin-bottom: 10px;">
                                If you have any questions or need to make changes to your booking, please feel free to contact us.
                            </p>

                            <p style="font-size: 16px; font-weight: bold; color: #da373d;">
                                We will contact you as soon as possible to finalize the arrangements! 🎶✨
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="background: #f1f1f1; padding: 15px; border-radius: 0 0 8px 8px;">
                            <p style="color: #555; font-size: 14px; margin: 0;">© {{ date('Y') }} Pearl Princess Events. All Rights Reserved.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
