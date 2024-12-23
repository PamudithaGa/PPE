<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/myscripts.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="h-screen w-1/5 bg-gray-900 shadow-lg">
            <div class="mt-[140px] flex items-center justify-center">
                <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
            </div>
            <nav class="mt-8">
                <ul>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="#">Admins</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="#">Users</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="{{ route('products.index') }}">Products Management</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="#">Event Management</a></li>
                    <li class="px-6 py-2 text-gray-200 hover:bg-gray-700"><a href="#">Logout</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-8">
            <header class="mb-8 flex items-center justify-between bg-white p-4 shadow-md">
                <h1 class="text-2xl font-bold text-gray-700">Products Management Dashboard</h1>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-700">Welcome, Admin</span>
                    <a href="#">
                        <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
                    </a>
                </div>
            </header>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Manage Products</h2>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 rounded bg-green-500 p-4 text-white">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Add Product Form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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

                <!-- Products Table -->
                <h3 class="my-6 text-xl font-semibold text-gray-800">Products List</h3>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Product ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="px-4 py-2">{{ $product->_id }}</td>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">LKR {{ $product->price }}</td>
                                <td class="px-4 py-2">{{ $product->category }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover">
                                </td>
                                <td class="px-4 py-2">
                                    <button class="rounded bg-blue-500 px-3 py-1 text-white">Update</button>
                                </td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('products.destroy', $product->_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600" type="submit">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">No products found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
