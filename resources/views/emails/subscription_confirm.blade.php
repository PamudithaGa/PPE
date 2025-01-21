<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscription Confirmation</title>
</head>
<body>
    <h1 style="text-align: center; color: #4a90e2;">Thank You for Subscribing!</h1>
    <p style="text-align: center;">Dear {{ $subscription->user->name }},</p>
    <p style="text-align: center;">Your subscription to the <strong>{{ $subscription->plan }}</strong> plan has been successfully activated.</p>

    <p style="text-align: center;">
        <strong>Subscription ID:</strong> {{ $subscription->stripe_payment_id }}<br>
        <strong>Expiration Date:</strong> {{ $subscription->expires_at->toFormattedDateString() }}
    </p>

    <p style="text-align: center;">We are excited to have you onboard! If you have any questions, feel free to contact our support team.</p>

    <div style="text-align: center; margin-top: 30px;">
        <img src="{{ asset('img/subscriptionImage.jpg') }}" alt="Subscription" style="height: 450px;">
    </div>
</body>
</html>
