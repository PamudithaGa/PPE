{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <Script src="https://cdn.tailwindcss.com"></Script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

    <div class="fixed h-screen w-1/5 bg-gray-900 shadow-lg">
        <div class="mt-[140px] flex items-center justify-center">
            <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
        </div>
        <nav class="mt-[40px]">
            <ul>
                <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Dashboard</a></li>
                <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Users</a></li>
                <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('products.index') }}">Product Management</a></li>
                <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('events.index') }}">Event Management</a></li>
                <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Orders</a></li>
                <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="ml-[330px] w-4/5 bg-gray-100 p-8">
        <header class="mb-1 mt-[20px] flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
            <h1 class="text-2xl font-bold text-gray-700">Admin Dashboard</h1>
            <div class="flex items-center">
                <span class="mr-4 text-gray-700">Welcome, Admin</span>
                <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
            </div>
        </header>

    <canvas id="purchasesChart" class="h-[100px] w-[100px]"></canvas>

    <script>

        var ticketCount = {{ $ticketCount }};
        var productCount = {{ $productCount }};
        
        var ctx = document.getElementById('purchasesChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Ticket Purchases', 'Product Purchases'],
                datasets: [{
                    label: 'Purchases',
                    data: [ticketCount, productCount], 
                    backgroundColor: ['#FF6384', '#36A2EB'], 
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>
</html> --}}


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

    <!-- Sidebar -->
    <div class="fixed h-screen w-1/5 bg-gray-900 shadow-lg">
        <div class="mt-[100px] flex items-center justify-center">
            <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
        </div>
        <nav class="mt-[40px]">
            <ul>
                <li class="px-6 py-2 text-gray-200 transition duration-300 ease-in-out hover:bg-gray-700"><a href="{{ url('/about') }}">Dashboard</a></li>
                <li class="px-6 py-2 text-gray-200 transition duration-300 ease-in-out hover:bg-gray-700"><a href="{{ url('/about') }}">Users</a></li>
                <li class="px-6 py-2 text-gray-200 transition duration-300 ease-in-out hover:bg-gray-700"><a href="{{ route('products.index') }}">Product Management</a></li>
                <li class="px-6 py-2 text-gray-200 transition duration-300 ease-in-out hover:bg-gray-700"><a href="{{ route('events.index') }}">Event Management</a></li>
                <li class="px-6 py-2 text-gray-200 transition duration-300 ease-in-out hover:bg-gray-700"><a href="{{ url('/about') }}">Orders</a></li>
                <li class="px-6 py-2 text-gray-200 transition duration-300 ease-in-out hover:bg-gray-700"><a href="{{ url('/about') }}">Logout</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content Area -->
    <div class="ml-[20%] w-4/5 p-8">
        <!-- Header -->
        <header class="mb-8 flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
            <h1 class="text-2xl font-semibold text-gray-700">Admin Dashboard</h1>
            <div class="flex items-center">
                <span class="mr-4 text-gray-700">Welcome, Admin</span>
                <button class="rounded bg-gray-900 px-4 py-2 text-white transition duration-300 ease-in-out hover:bg-gray-700">Logout</button>
            </div>
        </header>

<!-- Content Section with Pie Chart -->
<div class="rounded-lg bg-white p-6 shadow-md">
    <h2 class="mb-4 text-xl font-semibold text-gray-700">Purchases Overview</h2>
    <div class="flex h-[200px] w-[200px] items-center justify-center">
        <!-- Pie Chart Canvas with responsive width and height -->
        <canvas id="purchasesChart" class="h-[400px] w-[400px]"></canvas>
    </div>

</div>

        
        <!-- Info Cards Section -->
        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Sample info cards can go here -->
            <div class="rounded-lg bg-white p-6 shadow-md">
                <h3 class="text-lg font-semibold text-gray-700">Ticket Purchases</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $ticketCount }}</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-md">
                <h3 class="text-lg font-semibold text-gray-700">Product Purchases</h3>
                <p class="text-2xl font-bold text-gray-900">{{ $productCount }}</p>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        // Data from controller
        var ticketCount = {{ $ticketCount }};
        var productCount = {{ $productCount }};
        
        // Create pie chart
        var ctx = document.getElementById('purchasesChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Ticket Purchases', 'Product Purchases'],
                datasets: [{
                    label: 'Purchases',
                    data: [ticketCount, productCount],
                    backgroundColor: ['#FF6384', '#36A2EB'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
        
    </script>

    

</body>
</html>
