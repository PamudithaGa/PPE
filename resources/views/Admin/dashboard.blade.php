<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

<div class="fixed hidden h-screen w-64 bg-gray-900 shadow-lg transition-all duration-300 ease-in-out md:block" id="sidebar">
    <div class="mt-10 flex flex-col items-center">
        <img class="h-16 w-16 rounded-full border-2 border-gray-500" src="{{ asset('img/admin.png') }}" alt="Admin Profile Picture">
        <h2 class="mt-2 text-lg font-semibold text-white">Admin Panel</h2>
    </div>

    <nav class="mt-6">
        <ul class="space-y-2">
            <li><a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white"><i class="fas fa-tachometer-alt mr-3"></i> Dashboard</a></li>
            <li><a href="{{ route('products.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white"><i class="fas fa-box mr-3"></i> Product Management</a></li>
            <li><a href="{{ route('events.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white"><i class="fas fa-calendar-alt mr-3"></i> Event Management</a></li>
            <li><a href="{{ url('/logout') }}" class="flex items-center px-6 py-3 text-red-400 hover:bg-red-600 hover:text-white"><i class="fas fa-sign-out-alt mr-3"></i> Logout</a></li>
        </ul>
    </nav>
</div>

<button class="fixed left-4 top-4 rounded-md bg-gray-800 p-2 text-white md:hidden" id="menu-toggle">
    <i class="fas fa-bars"></i>
</button>

<div class="ml-[20%] w-4/5 p-8">
    <header class="mb-8 flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
        <h1 class="text-2xl font-semibold text-gray-700">Admin Dashboard</h1>
        <div class="flex items-center">
            <span class="mr-4 text-gray-700">Welcome, Admin</span>
            <button class="rounded bg-gray-900 px-4 py-2 text-white hover:bg-gray-700">Logout</button>
        </div>
    </header>

    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-red-500 to-red-700 p-6 shadow-lg hover:scale-105">
            <div class="absolute right-2 top-2 text-6xl text-white opacity-20"><i class="fas fa-money-bill-wave"></i></div>
            <h3 class="text-lg font-semibold text-white">Total Revenue</h3>
            <p class="text-3xl font-bold text-white">LKR. {{ number_format($totalRevenue, 2) }}</p>
        </div>

        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 p-6 shadow-lg hover:scale-105">
            <div class="absolute right-2 top-2 text-6xl text-white opacity-20"><i class="fas fa-coins"></i></div>
            <h3 class="text-lg font-semibold text-white">Total Orders</h3>
            <p class="text-3xl font-bold text-white">{{ $ordersCount }}</p>
        </div>

        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-green-500 to-green-700 p-6 shadow-lg hover:scale-105">
            <div class="absolute right-2 top-2 text-6xl text-white opacity-20"><i class="fas fa-shopping-cart"></i></div>
            <h3 class="text-lg font-semibold text-white">Total Bookings</h3>
            <p class="text-3xl font-bold text-white">{{ $bookingsCount }}</p>
        </div>

        <div class="relative transform overflow-hidden rounded-lg bg-gradient-to-r from-gray-500 to-gray-700 p-6 shadow-lg hover:scale-105">
            <div class="absolute right-2 top-2 text-6xl text-white opacity-20"><i class="fas fa-box-open"></i></div>
            <h3 class="text-lg font-semibold text-white">Coming Soon...</h3>
        </div>
    </div>

    <div class="rounded-lg bg-white p-6 shadow-md dark:bg-gray-900">
        <h2 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-300">Purchases Overview</h2>
        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2">
            <div class="flex h-[400px] w-[400px] items-center justify-center"><canvas id="purchasesChart"></canvas></div>
            <div class="flex h-[400px] w-[400px] items-center justify-center"><canvas id="pieChart"></canvas></div> 
        </div>
        <div class="mx-auto mt-[100px] flex w-3/4 items-center justify-center"><canvas id="lineChart"></canvas></div> 
    </div>
</div>

<script>
    new Chart(document.getElementById('lineChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [
                { label: 'Orders', data: {!! json_encode($ordersByMonth) !!}, borderColor: '#FF5722', fill: true },
                { label: 'Bookings', data: {!! json_encode($bookingsByMonth) !!}, borderColor: '#3F51B5', fill: true }
            ]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    new Chart(document.getElementById('pieChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Orders Revenue', 'Tickets Revenue'],
            datasets: [{ data: [{{ $totalRevenue }}, 100000], backgroundColor: ['#009688', '#FFC107'] }]
        }
    });

    new Chart(document.getElementById('purchasesChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Ticket Purchases', 'Product Purchases'],
            datasets: [{ data: [{{ $ticketCount }}, {{ $productCount }}], backgroundColor: ['#FF6384', '#36A2EB'] }]
        }
    });

    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('hidden');
    });
</script>

<script src="https://kit.fontawesome.com/ee10af8ca1.js" crossorigin="anonymous"></script>

</body>
</html>
