<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
<div class="fixed hidden h-screen w-64 bg-gray-900 shadow-lg transition-all duration-300 ease-in-out md:block" id="sidebar">

    <div class="mt-10 flex flex-col items-center">
        <img class="h-16 w-16 rounded-full border-2 border-gray-500" src="{{ asset('..\img\admin.png')}}" alt="Admin Profile Picture">
        <h2 class="mt-2 text-lg font-semibold text-white">Admin Panel</h2>
    </div>

    <nav class="mt-6">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center rounded-md px-6 py-3 text-gray-300 transition hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="flex items-center rounded-md px-6 py-3 text-gray-300 transition hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-box mr-3"></i> Product Management
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" class="flex items-center rounded-md px-6 py-3 text-gray-300 transition hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-calendar-alt mr-3"></i> Event Management
                </a>
            </li> 
            <li>
                <a href="{{ route('orders.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fa-solid fa-truck-fast mr-3" style="color: #ffffff; "></i> Orders
                </a>
            </li>
            
            <li>
                <a href="{{ url('/logout') }}" class="flex items-center rounded-md px-6 py-3 text-red-400 transition hover:bg-red-600 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
</div>

<button class="fixed left-4 top-4 rounded-md bg-gray-800 p-2 text-white focus:outline-none md:hidden" id="menu-toggle">
    <i class="fas fa-bars"></i>
</button>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });
</script>

<script src="https://kit.fontawesome.com/ee10af8ca1.js" crossorigin="anonymous"></script>


        <div class="ml-[330px] w-4/5 bg-gray-100 p-8">
            <header class="mb-1 mt-[20px] flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
                <h1 class="text-2xl font-bold text-gray-700">Orders</h1>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-700">Welcome, Admin</span>
                    <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
                </div>
            </header>

<div class="container mx-auto p-6">

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        @foreach($orders as $order)
        <div class="rounded-lg bg-white p-6 shadow-lg transition duration-300 hover:shadow-xl">
            
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800">Order #{{ $order->_id }}</h2>
                <span class="px-3 py-1 text-xs font-bold uppercase rounded-full 
                             @if($order->payment_status == 'pending') bg-yellow-500 text-white 
                             @elseif($order->payment_status == 'completed') bg-green-500 text-white 
                             @else bg-red-500 text-white @endif">
                    {{ ucfirst($order->payment_status) }}
                </span>
            </div>

            <div class="mb-4 grid grid-cols-2 gap-6">
                <p class="text-sm text-gray-600"><strong>Total:</strong> LKR {{ number_format($order->total_amount, 2) }}</p>
                <p class="text-sm text-gray-600"><strong>Address:</strong> {{ $order->address }}</p>
            </div>

            <div class="mb-4 rounded-lg border p-4">
                <h3 class="text-sm font-semibold text-gray-800">Items:</h3>
                <ul class="list-disc pl-5 text-gray-700">
                    @foreach($order->items as $item)
                        <li>{{ $item['name'] }} ({{ $item['quantity'] }}) - LKR {{ number_format($item['price'], 2) }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
        @endforeach
    </div>
</div>
