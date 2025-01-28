@extends('layout')
@section('content')

<body class="m-0">
    <section>
        <div class="h-[100px]"></div>
        
        {{-- <div class="ml-[100px] mt-[50px]">
            <p class="font-serif text-[16px]">23 March 2024 &nbsp;&nbsp;|&nbsp;&nbsp; By Pearl Princess Events</p>
            <p class="font-k2d text-[28px]">Dulaj + Rasika's Asian Type Wedding</p>
        </div>
        <img class="relative ml-[170px] mt-[40px] h-[450px]" src="{{ asset('..\img\IMG-0543.jpg')}}">
         --}}

         <div class="mt-12 px-6 md:ml-24">
            <!-- Event Details -->
            <p class="font-serif text-sm text-gray-600">
                23 March 2024 &nbsp;&nbsp;|&nbsp;&nbsp; By Pearl Princess Events
            </p>
            <p class="font-k2d mt-2 text-xl md:text-2xl">
                Dulaj + Rasika's Asian Type Wedding
            </p>
        
            <!-- Event Image -->
            <div class="mt-6 flex justify-center md:justify-start">
                <img 
                    class="h-[450px] w-full max-w-[700px] rounded-lg object-cover shadow-lg md:ml-10" 
                    src="{{ asset('img/IMG-0543.jpg') }}" 
                    alt="Dulaj and Rasika's Wedding"
                >
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="ml-[170px] mt-[100px]">
                <p class="font-k2d pb-[25px] text-[32px] text-[#E7892C]">WEDDING DETAILS</p>
                <ul class="space-y-2 font-thin text-gray-600">
                    <li>Photography: Nadun Lakmina Photography</li>
                    <li>Flora: Golden Flora</li>
                    <li>Suit: Namal Balachandra</li>
                    <li>Dress: Dress By Uma</li>
                    <li>Cake: Sadu Cake Creation</li>
                    <li>Make Up: Indu Salon</li>
                    <li>Entertainment: Dick J Dj</li>
                    <li>Venue: Sudu Araliya Hotel</li>
                    <li>Planning: Supeshala Kavinda</li>
                </ul>
            </div>

            {{-- <div class="ml-[170px] mt-[100px]">
                <img class="w-[350px]" src="{{ asset('..\img\IMG-0537.jpg')}}">
            </div> --}}

            <div class="flex justify-center">
                <img class="w-[350px] shadow-md" src="{{ asset('img/IMG-0537.jpg') }}" alt="Wedding Highlight">
            </div>
        </div>


        <div class="mt-10 grid gap-10 px-6 md:px-20">
            <!-- Row 1 -->
            <div class="grid grid-cols-2 gap-6">
                <img class="w-full shadow-md lg:w-[500px]" src="{{ asset('img/IMG-0501.jpg') }}" alt="Gallery Image 1">
                <img class="w-full shadow-md lg:w-[500px]" src="{{ asset('img/IMG-0558.jpg') }}" alt="Gallery Image 2">
            </div>

            <div class="grid grid-cols-3 gap-6">
                <img class="w-full shadow-md lg:w-[280px]" src="{{ asset('img/IMG-0506.jpg') }}" alt="Gallery Image 3">
                <img class="w-full shadow-md lg:w-[280px]" src="{{ asset('img/IMG-0533.jpg') }}" alt="Gallery Image 4">
                <img class="w-full shadow-md lg:w-[280px]" src="{{ asset('img/IMG-0520.jpg') }}" alt="Gallery Image 5">
            </div>

            <div>
                <img class="shadow-md lg:w-[900px]" src="{{ asset('img/IMG-0525.jpg') }}" alt="Gallery Image 6">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-6">
                    <img class="w-full shadow-md lg:w-[450px]" src="{{ asset('img/IMG-0505.jpg') }}" alt="Gallery Image 7">
                    <img class="w-full shadow-md lg:w-[450px]" src="{{ asset('img/IMG-0517.jpg') }}" alt="Gallery Image 8">
                </div>
                <div class="space-y-6">
                    <img class="w-full shadow-md lg:w-[450px]" src="{{ asset('img/IMG-0569.jpg') }}" alt="Gallery Image 9">
                    <img class="w-full shadow-md lg:w-[450px]" src="{{ asset('img/IMG-0059.jpg') }}" alt="Gallery Image 10">
                </div>
            </div>
        
        </div>

        
        {{-- <diV class="ml-[170px] mr-[170px] mt-[50px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\IMG-0501.jpg')}}"></div>
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\IMG-0558.jpg')}}"></div></div>
        </diV> --}}

        {{-- <diV class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\IMG-0506.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\IMG-0533.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\IMG-0520.jpg')}}"></div>
        </diV> --}}

        {{-- <diV class="ml-[170px] mr-[170px] flex w-[900px] gap-10 p-[20px]">
            <div class="w-[900px]"><img class="" src="{{ asset('..\img\IMG-0525.jpg')}}"></div>
        </diV> --}}

        {{-- <div class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 grid-rows-2 gap-10 p-[20px]">
            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0505.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0517.jpg')}}"></div>
            </div>

            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0569.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0059.jpg')}}"></div>
            </div>
        </div> --}}

        
        {{-- <div class="mt-12 grid grid-cols-1 gap-8 px-6 md:grid-cols-2 md:px-20">
            <!-- Wedding Details -->
            <div>
                <p class="font-k2d mb-6 text-2xl font-bold text-[#E7892C]">WEDDING DETAILS</p>
                <ul class="space-y-2 font-thin text-gray-600">
                    <li>Photography: Nadun Lakmina Photography</li>
                    <li>Flora: Golden Flora</li>
                    <li>Suit: Namal Balachandra</li>
                    <li>Dress: Dress By Uma</li>
                    <li>Cake: Sadu Cake Creation</li>
                    <li>Make Up: Indu Salon</li>
                    <li>Entertainment: Dick J Dj</li>
                    <li>Venue: Sudu Araliya Hotel</li>
                    <li>Planning: Supeshala Kavinda</li>
                </ul>
            </div>
        
            <!-- Wedding Highlight Image -->
            <div class="flex justify-center">
                <img class="w-[350px] rounded-lg shadow-md" src="{{ asset('img/IMG-0537.jpg') }}" alt="Wedding Highlight">
            </div>
        </div>
        
        <!-- Gallery Section -->
        <div class="mt-10 grid gap-10 px-6 md:px-20">
            <!-- Row 1 -->
            <div class="grid grid-cols-2 gap-6">
                <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0501.jpg') }}" alt="Gallery Image 1">
                <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0558.jpg') }}" alt="Gallery Image 2">
            </div>
        
            <!-- Row 2 -->
            <div class="grid grid-cols-3 gap-6">
                <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0506.jpg') }}" alt="Gallery Image 3">
                <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0533.jpg') }}" alt="Gallery Image 4">
                <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0520.jpg') }}" alt="Gallery Image 5">
            </div>
        
            <!-- Full-width Image -->
            <div>
                <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0525.jpg') }}" alt="Gallery Image 6">
            </div>
        
            <!-- Two Columns with Stacked Images -->
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-6">
                    <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0505.jpg') }}" alt="Gallery Image 7">
                    <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0517.jpg') }}" alt="Gallery Image 8">
                </div>
                <div class="space-y-6">
                    <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0569.jpg') }}" alt="Gallery Image 9">
                    <img class="w-full rounded-lg shadow-md" src="{{ asset('img/IMG-0059.jpg') }}" alt="Gallery Image 10">
                </div>
            </div>
        </div> --}}
        
    </section>  
</body>
@endsection