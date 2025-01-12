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

    <style>
        #updateProductCard {
            transform: translateY(100%);
            opacity: 0;
            transition: transform 0.4s ease-out, opacity 0.4s ease-out;
        }
      
        #updateProductCard.active {
            transform: translateY(0);
            opacity: 1;
        }
      </style>
      

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="fixed h-full w-1/5 bg-gray-900 text-gray-200 shadow-lg">
            <div class="flex flex-col items-center py-10">
                <img class="h-16 w-16 rounded-full" src="https://via.placeholder.com/150" alt="Admin Profile Picture">
                <h2 class="mt-4 text-lg font-semibold">Admin Panel</h2>
            </div>
            <nav class="mt-6">
                <ul class="space-y-2">
                    <li class="px-6 py-3 hover:bg-gray-700"><a href="#">Admins</a></li>
                    <li class="px-6 py-3 hover:bg-gray-700"><a href="#">Users</a></li>
                    <li class="px-6 py-3 hover:bg-gray-700"><a href="{{ route('products.index') }}">Products Management</a></li>
                    <li class="px-6 py-3 hover:bg-gray-700"><a href="{{ route('events.index') }}">Event Management</a></li>
                    <li class="px-6 py-3 hover:bg-gray-700"><a href="#">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="ml-[330px] w-4/5 bg-gray-100 p-8">
            <header class="mb-8 flex items-center justify-between bg-white p-4 shadow-md">
                <h1 class="text-2xl font-bold text-gray-700">Products Management Dashboard</h1>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-700">Welcome, Admin</span>
                    <a href="#">
                        <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
                    </a>
                </div>
            </header>

            <section class="rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Manage Products</h2>


                <!-- Add Product Form -->
                {{-- <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <h3 class="text-lg font-semibold text-gray-700">Add Product</h3>
                    <div class="grid grid-cols-2 gap-4">
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
                    <div class="flex justify-end space-x-4">
                        <button class="rounded bg-red-500 px-4 py-2 text-white" type="reset">Cancel</button>
                        <button class="rounded bg-green-500 px-4 py-2 text-white" type="submit">Add Product</button>
                    </div>
                </form> --}}

                <!-- Add Product Form -->
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <h3 class="text-lg font-semibold text-gray-700">Add Product</h3>
    <div class="grid grid-cols-2 gap-4">
        <input type="text" name="name" class="w-full rounded border px-3 py-2" placeholder="Product Name" required>
        <input type="number" name="price" class="w-full rounded border px-3 py-2" placeholder="Product Price" required>
        <select id="category" name="category" class="w-full rounded border px-3 py-2" required onchange="toggleJewelryTable()">
            <option value="" disabled selected>Select Category</option>
            <option value="Costumes">Costumes</option>
            <option value="Jewelry">Jewelry</option>
        </select>
        <input type="text" name="description" class="w-full rounded border px-3 py-2" placeholder="Product Description" required>
        <input type="file" name="image" class="w-full rounded border px-3 py-2" required>
    </div>
    
    <!-- Jewelry-Specific Table -->
    <div id="jewelry-table" class="mt-4 hidden">
        <h4 class="text-md font-semibold text-gray-700">Jewelry Details</h4>
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Material</th>
                    <th class="border border-gray-300 px-4 py-2">Weight (grams)</th>
                    <th class="border border-gray-300 px-4 py-2">Kt</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" name="material" class="w-full rounded border px-2 py-1" placeholder="e.g., Gold, Silver">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="number" name="weight" class="w-full rounded border px-2 py-1" placeholder="e.g., 10">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="text" name="kt" class="w-full rounded border px-2 py-1" placeholder="e.g., 18, 22">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex justify-end space-x-4">
        <button class="rounded bg-red-500 px-4 py-2 text-white" type="reset">Cancel</button>
        <button class="rounded bg-green-500 px-4 py-2 text-white" type="submit">Add Product</button>
    </div>
</form>

<script>
    // JavaScript to toggle the Jewelry table
    function toggleJewelryTable() {
        const category = document.getElementById("category").value;
        const jewelryTable = document.getElementById("jewelry-table");

        if (category === "Jewelry") {
            jewelryTable.classList.remove("hidden");
        } else {
            jewelryTable.classList.add("hidden");
        }
    }
</script>


                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 rounded bg-green-500 p-4 text-white">
                        {{ session('success') }}
                    </div>
                @endif                

                <!-- Products Table -->
                <h3 class="my-6 text-xl font-semibold text-gray-800">Products List</h3>
                <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Price</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Category</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Image</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($products as $product)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">LKR {{ $product->price }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->category }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="h-16 w-16 rounded object-cover">
                                </td>
                                <td class="space-x-2 px-4 py-2">
                                    <button onclick="showUpdateForm('{{ $product->_id }}')" class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">Update</button>
                                    <form action="{{ route('products.destroy', $product->_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-gray-700">No products found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Update Product Form -->
                <div id="updateProductCard" class="fixed bottom-0 left-0 hidden w-3/4 rounded-t-lg bg-white p-6 shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Update Product</h3>
                    <form id="updateForm" method="POST" enctype="multipart/form-data" action="#">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="updateProductId" name="product_id">
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <input type="text" id="updateName" name="name" class="w-full rounded border px-3 py-2" placeholder="Product Name" required>
                            <input type="number" id="updatePrice" name="price" class="w-full rounded border px-3 py-2" placeholder="Product Price" required>
                            <select id="updateCategory" name="category" class="w-full rounded border px-3 py-2" required>
                                <option value="" disabled>Select Category</option>
                                <option value="Costumes">Costumes</option>
                                <option value="Jewelry">Jewelry</option>
                            </select>
                            <input type="text" id="updateDescription" name="description" class="w-full rounded border px-3 py-2" placeholder="Product Description" required>
                            <input type="file" id="updateImage" name="image" class="w-full rounded border px-3 py-2">
                        </div>
                        <button class="rounded bg-red-500 px-4 py-2 text-white" type="reset" onclick="hideUpdateForm()">Cancel</button>
                        <button class="rounded bg-blue-500 px-4 py-2 text-white" type="submit">Update Product</button>
                    </form>
                </div>
                

            </section>
        </div>
    </div>

    <script>
        function showUpdateForm(productId) {
    const updateCard = document.getElementById('updateProductCard');
    const updateForm = document.getElementById('updateForm');

    // Fetch product details
    fetch(`/products/${productId}/edit`)
        .then(response => response.json())
        .then(product => {
            // Populate the form with product data
            document.getElementById('updateProductId').value = product._id;
            document.getElementById('updateName').value = product.name;
            document.getElementById('updatePrice').value = product.price;
            document.getElementById('updateCategory').value = product.category;
            document.getElementById('updateDescription').value = product.description;

            // Update the form action
            updateForm.action = `/products/${product._id}`;

            // Show the update card with animation
            updateCard.classList.remove('hidden');
            updateCard.classList.add('active');
        })
        .catch(error => console.error('Error fetching product details:', error));
}

function hideUpdateForm() {
    const updateCard = document.getElementById('updateProductCard');
    updateCard.classList.remove('active');
    setTimeout(() => {
        updateCard.classList.add('hidden');
    }, 400); // Match the duration of the transition
}

    </script>
</body>
</html>
