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
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <div class="h-screen w-1/5 bg-gray-900 shadow-lg">
            <div class="mt-[140px] flex items-center justify-center">
                <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
            </div>

            <nav class="mt-[40px]">
                <ul>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Admins</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Users</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('ProductDashboard') }}">Products Management Dashboard</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('EventDashboard') }}">Event Management Dashboard</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Orders</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ url('/about') }}">Logout</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 bg-gray-100 p-8">
            <header class="mb-8 mt-[80px] flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
                <h1 class="text-2xl font-bold text-gray-700">Products Management Dashboard</h1>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-700">Welcome, Admin</span>
                    <a href="{{ url('/about') }}">
                        <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
                    </a>
                </div>
            </header>

            <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Manage Products</h2>

                <!-- Add Product Form -->
                <div class="container mx-auto mt-10">
                    @if(session('success'))
                        <div class="rounded bg-green-500 p-4 text-white">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
                    @csrf
                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Add Product</h3>
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <input type="text" name="name" class="w-full rounded border px-3 py-2" placeholder="Product Name" required>
                        <input type="number" name="price" class="w-full rounded border px-3 py-2" placeholder="Product Price" required>
                        <select name="category" class="w-full rounded border px-3 py-2" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="Costumes">Costumes</option>
                            <option value="Jewelry">Jewelry</option>
                        </select>
                        <input type="text" name="description" class="w-full rounded border px-3 py-2" placeholder="Product Description" required>
                        <input type="file" name="image" class="w-full rounded border px-3 py-2" required>
                    </div>
                    <button class="rounded bg-red-500 px-4 py-2 text-white" type="reset">Cancel</button>
                    <button class="rounded bg-green-500 px-4 py-2 text-white" type="submit">Add Product</button>
                </form>
                
                


                <!-- Update Product Card -->
                <div id="updateProductCard" class="mb-8 hidden rounded-lg bg-white p-6 shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Update Product</h3>
                    <form method="POST" enctype="multipart/form-data" action="#" onsubmit="return validateForm()">
                        <input type="hidden" name="product_id">
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <input type="text" name="new_name" class="w-full rounded border px-3 py-2" placeholder="New Product Name">
                            <input type="number" name="new_price" id="updatePrice" class="w-full rounded border px-3 py-2" placeholder="New Product Price">
                            <select name="new_category" class="w-full rounded border px-3 py-2" required>
                                <option value="" disabled>Select Category</option>
                                <option value="Costumes">Costumes</option>
                                <option value="Jewelry">Jewelry</option>
                            </select>
                            <input type="text" name="new_description" class="w-full rounded border px-3 py-2" placeholder="New Product Description">
                            <input type="file" name="image" class="w-full rounded border px-3 py-2">
                        </div>
                        <button class="rounded bg-red-500 px-4 py-2 text-white" type="reset">Cancel</button>
                        <button class="rounded bg-blue-500 px-4 py-2 text-white" type="submit">Update Product</button>
                    </form>
                </div>

                <!-- Products Table -->
                <div class="mb-6 flex items-center">
                    <h3 class="mr-4 text-xl font-semibold text-gray-800">Products List</h3>
                </div>
                <div>
                    <input type="text" id="searchInput" onkeyup="filterProducts()" placeholder="Search by name" class="w-full rounded border px-3 py-2" />
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-600">Product ID</th>
                                <th class="px-4 py-2 text-left text-gray-600">Name</th>
                                <th class="px-4 py-2 text-left text-gray-600">Price</th>
                                <th class="px-4 py-2 text-left text-gray-600">Category</th>
                                <th class="px-4 py-2 text-left text-gray-600">Image</th>
                                <th class="px-4 py-2 text-left text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product as $product)
                                <tr class="product-row">
                                    <td class="px-4 py-2">{{ $product->_id }}</td>
                                    <td class="product-name px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">LKR {{ $product->price }}</td>
                                    <td class="px-4 py-2">{{ $product->category }}</td>
                                    <td class="px-4 py-2">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover">
                                    </td>
                                    <td class="px-4 py-2">
                                        <button class="mb-2 rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">Update</button>
                                        <button class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</body>
