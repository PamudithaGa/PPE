@extends('layout')
@section('title', 'Pearl Princess Events | Utility')
@section('content')
{{-- 151E3D --}}
<body>
    <div class="relative h-[400px] bg-gradient-to-r from-indigo-800 to-[#0492C2]">
        
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <div class="relative flex h-full flex-col items-center justify-center pb-[90px] pt-9 text-center">
            <h2 class="mt-[100px] font-serif text-[28px] text-white md:text-[36px]" style="font-family: 'Playfair Display', serif;">
                Pearl Princess Events
            </h2>
            <h2 class="mt-4 font-serif text-[48px] text-white md:text-[56px]" style="font-family: 'Playfair Display', serif;">
                Utility
            </h2>
            <a href="{{ route('serivces') }}"
                class="mt-6 rounded-lg bg-white px-6 py-3 text-sm font-bold text-indigo-800 shadow-md transition hover:bg-indigo-800 hover:text-white"
                style="font-family: 'Poppins', sans-serif;">
                Explore More
            </a>
        </div>
    </div>
    
    

    <div class="container mx-auto p-[90px]">
        @foreach($productsByCategory as $category => $products)
            <div class="mb-10">
                <h2 class="mb-5 text-2xl font-bold text-[#281E5D]">{{ $category }}</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($products as $product)
                        <div class="w-[300px] rounded-lg p-4">
                            <a href="javascript:void(0)" onclick="showProductDetails('{{ $product->_id }}')">
                                <img 
                                    src="{{ asset('img/' . $product->image) }}" 
                                    alt="{{ $product->name }}" 
                                    class="mb-4 h-[300px] w-[300px] border object-cover shadow-md"
                                />
                            </a>
                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                            <div class="mt-2 flex items-center justify-between">

                                <p class="text-lg font-bold text-green-600">Rs {{ $product->price }}.00</p>
                                <a href="javascript:void(0)"
                                    onclick="addToCart('{{ $product->_id }}')"
                                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md transition hover:bg-indigo-700 hover:shadow-lg">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal for Product Details -->
    <div id="product-details-modal" class="fixed left-0 top-0 z-50 flex hidden h-screen w-screen items-center justify-center bg-black bg-opacity-70">
        <div class="relative w-[90%] max-w-lg rounded-lg bg-white p-6 shadow-lg">
            <button 
            onclick="closeModal()" 
            class="absolute right-4 top-4 flex h-8 w-8 items-center justify-center rounded-full bg-red-600 text-white transition hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300"
            aria-label="Close modal">
            X
        </button>
            <div id="product-details-content" class="mb-6"></div>
            <div class="mt-4 flex justify-end">
                <a href="javascript:void(0)"
                    onclick="addToCart('{{ $product->_id }}')"
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md transition hover:bg-indigo-700 hover:shadow-lg">
                    Add to Cart
                </a>
            </div>
        </div>
    </div>
    
</body>

@endsection

<script>
    function addToCart(productId) {
        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error('Error:', error));
    }

    function showProductDetails(productId) {
        fetch(`/product/details/${productId}`)
            .then(response => response.json())
            .then(data => {
                const modalContent = document.getElementById('product-details-content');
                modalContent.innerHTML = `
                    <img src="/img/${data.image}" alt="${data.name}" class="mb-4 h-64 w-full rounded-lg object-cover shadow-md">
                    <h3 class="text-xl font-bold">${data.name}</h3>
                    <p class="mt-2 font-bold text-green-600">Rs ${data.price}.00</p>
                    <p class="mt-2">${data.description}</p>
                    ${data.category === 'Jewelry' ? `


                        <table class="mt-[20px] w-full table-auto border-collapse border border-gray-300">
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
                                        ${data.material}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        ${data.weight}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        ${data.kt}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    ` : ''}
                `;
                document.getElementById('product-details-modal').classList.remove('hidden');
            })
            .catch(error => console.error('Error:', error));
    }

    function closeModal() {
        document.getElementById('product-details-modal').classList.add('hidden');
    }
</script>
