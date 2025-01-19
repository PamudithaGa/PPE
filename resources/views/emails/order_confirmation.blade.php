<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.js" defer></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="mx-auto max-w-3xl px-4 py-8">
        <div class="rounded-lg bg-white p-6 shadow-lg">
            <h1 class="mb-4 text-center text-3xl font-bold text-indigo-600">Thank You for Your Order, {{ $order->full_name }}!</h1>
            <p class="mb-8 text-center text-lg text-gray-600">Your order has been placed successfully. We're preparing it for shipment!</p>
            
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Order Details</h3>
                <ul class="mt-4 space-y-4">
                    @foreach($order->items as $item)
                        <li class="flex justify-between text-gray-700">
                            <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                            <span class="font-semibold text-indigo-600">LKR {{ number_format($item['price'], 2) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="border-t-2 border-gray-200 pt-4">
                <p class="text-lg font-semibold text-gray-800">Total Paid: <span class="text-indigo-600">LKR {{ number_format($order->total_amount, 2) }}</span></p>
            </div>

            <div class="mt-6">
                <p class="text-gray-700">Your order will be shipped to:</p>
                <div class="mt-2 rounded-lg bg-gray-100 p-4">
                    <p><strong>{{ $order->address }}</strong></p>
                    <p>Contact: <a href="tel:{{ $order->phone_number }}" class="text-indigo-600">{{ $order->phone_number }}</a></p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-gray-600">Thank you for shopping with us! We look forward to serving you again soon.</p>
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="inline-block rounded-full bg-indigo-600 px-6 py-2 text-white transition duration-300 hover:bg-indigo-700">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
