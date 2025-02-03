<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; margin: 0; color: #333;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f8f9fa">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background: #ffffff; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); margin: 20px 0; padding: 20px;">

                    <tr>
                        <td align="center" style="background: #4f46e5; padding: 20px; border-radius: 8px 8px 0 0;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Thank You for Your Order, {{ $order->full_name }}! 🎉</h1>
                            <p style="color: #ffffff; font-size: 16px; margin-top: 5px;">Your order has been placed successfully. We're preparing it for shipment!</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px; text-align: left;">
                            <h3 style="font-size: 20px; color: #333; margin-bottom: 10px;">Order Details</h3>
                            <table style="width: 100%; border-collapse: collapse;">
                                @foreach($order->items as $item)
                                <tr>
                                    <td style="padding: 8px; border-bottom: 1px solid #ddd; font-size: 16px;">{{ $item['name'] }} (x{{ $item['quantity'] }})</td>
                                    <td style="padding: 8px; border-bottom: 1px solid #ddd; text-align: right; font-size: 16px; font-weight: bold; color: #4f46e5;">
                                        LKR {{ number_format($item['price'], 2) }}
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                            <div style="border-top: 2px solid #ddd; padding-top: 10px; margin-top: 10px;">
                                <p style="font-size: 18px; font-weight: bold; color: #333;">
                                    Total Paid: <span style="color: #4f46e5;">LKR {{ number_format($order->total_amount, 2) }}</span>
                                </p>
                            </div>

                            <div style="margin-top: 20px; padding: 10px; background-color: #f3f4f6; border-radius: 5px;">
                                <p style="font-size: 16px; font-weight: bold; margin-bottom: 5px;">Shipping Address:</p>
                                <p style="font-size: 16px;">{{ $order->address }}</p>
                                <p style="font-size: 16px;">📞 Contact: 
                                    <a href="tel:{{ $order->phone_number }}" style="color: #4f46e5; text-decoration: none;">{{ $order->phone_number }}</a>
                                </p>
                            </div>

                            <div style="text-align: center; margin-top: 20px;">
                                <p style="font-size: 16px; color: #666;">Thank you for shopping with us! We look forward to serving you again soon.</p>
                                <a href="{{ route('home') }}" style="display: inline-block; padding: 12px 20px; background: #4f46e5; color: #ffffff; text-decoration: none; font-size: 16px; border-radius: 5px; margin-top: 10px;">
                                    🛒 Continue Shopping
                                </a>
                            </div>
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

