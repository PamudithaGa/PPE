{{-- @extends('layout')
@section('content')
<div class="container mx-auto mt-20 text-center">
    <h1 class="text-3xl font-bold text-green-600">Payment Successful!</h1>
    <p class="mt-4 text-lg">Thank you for your purchase. Your order has been placed successfully.</p>
    <a href="{{ route('cart.index') }}" class="mt-6 inline-block bg-black px-6 py-2 text-white">Back to Shop</a>
</div>
@endsection --}}


@extends('layout')

@section('content')
<body class="m-0">


    <div class="align-mid flex items-center justify-center pb-[40px] pt-[100px] font-serif">
        <div class="container mx-auto mt-[20px] text-center">
            
            <div class="mx-auto max-w-lg rounded-lg border-t-4 border-green-500 bg-white p-8 shadow-lg">
            
                <div class="mb-6 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.293 4.293a1 1 0 011.414 1.414L9 12.414 5.293 8.707a1 1 0 111.414-1.414L9 9.586l7.293-7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                

                <h1 class="animate__animated animate__fadeIn animate__delay-1s text-3xl font-bold text-green-600">Payment Successful!</h1>
                <p class="animate__animated animate__fadeIn animate__delay-2s mt-4 text-lg text-gray-700">Thank you for your purchase. Your order has been placed successfully. We are processing it and will update you soon!</p>
                
                <div class="mt-6">
                    <a href="{{ route('offerings') }}" class="inline-block transform rounded-lg bg-green-600 px-6 py-3 text-lg font-semibold text-white shadow-md transition duration-300 ease-in-out hover:scale-105 hover:bg-green-700">
                        Back to Shop
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>



    


<!-- Optional: Add animation library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
@endsection
