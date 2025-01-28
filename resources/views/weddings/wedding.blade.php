@extends('layout')

@section('content')

<body class="m-0">
    <section>
        <div class="h-[400px] bg-black"></div>
        <div class="mt-[-250px] items-center justify-center">
            <h2 class="text-center font-serif text-[25px] text-white">Pearl Princess</h2>
            <h2 class="mt-[20px] text-center font-serif text-[52px] text-white">WEDDINGS</h2>
        </div>

        {{-- <div class="mb-[100px] ml-[100px] mt-[190px] grid grid-cols-2 place-items-start">
            <div class="mb-[30px] mt-[30px]">
                <p class="font-josefin-slab text-pretty text-[16px]">Our team is dedicated to making the day you've always wanted a memorable one.<br><br>

                    We start with a personalized proposal that is tailored to your specific needs and goals. Once booked, 
                    your Pearl Princess Events team will work with you to create an inspiration board and floor plan based on your individual ideas. 
                    We promise customization ideas for everything from unique lighting to seating charts.<br><br>
                    
                    We handle the entire wedding preparation process. Relax and have fun. Your  Pearl Princess Events staff will be with you every step of the way, 
                    ensuring that your special day is seamless and memorable.</p>
            </div>            
            <div>
                <img class="ml-[150px] mt-[60px] w-[300px]" src="{{ asset('..\img\couple.jpg')}}">
            </div>
        </div> --}}

        <div class="mx-auto mb-[100px] mt-[190px] grid max-w-7xl grid-cols-1 gap-10 px-8 md:grid-cols-2 md:place-items-start">
            <!-- Text Section -->
            <div class="text-justify">
                <p class="text-pretty font-serif text-[16px] leading-relaxed">
                    Our team is dedicated to making the day you've always wanted a memorable one.<br><br>
                    We start with a personalized proposal tailored to your specific needs and goals. Once booked, your Pearl Princess Events team will work with you to create an inspiration board and floor plan based on your individual ideas. We promise customization ideas for everything from unique lighting to seating charts.<br><br>
                    We handle the entire wedding preparation process. Relax and have fun! Your Pearl Princess Events staff will be with you every step of the way, ensuring that your special day is seamless and memorable.
                </p>
            </div>
        
            <!-- Image Section -->
            <div class="flex justify-center md:ml-[50px]">
                <img 
                    class="w-[300px] shadow-lg md:ml-[50px] md:mt-[60px]" 
                    src="{{ asset('img/couple.jpg') }}" 
                    alt="Couple Wedding Image"
                >
            </div>
        </div>
        

        {{-- <div class="min bg-[#761313] pb-[5px] pt-[5px]">
            <div class="bg-gray-200">
                <div class="ml-[100px] grid grid-cols-2 place-items-start">
                    <div>
                        <img class="ml-[150px] mt-[130px] w-[300px]" src="{{ asset('..\img\wed.jpg')}}">
                    </div>
                    <div>
                        <h2 class="font-k2d mt-[50px] text-[32px]">WEDDING SERVICES</h2>
                        <ol class="font-lateef mb-[50px] mt-[20px] list-disc text-[20px]">
                            <li>Ceremony & Reception Coordination</li>
                            <li>Rehearsal Dinner Coordination</li>
                            <li>Rentals & Vendor Coordination</li>
                            <li>Wedding Day Timeline</li>
                            <li>Floor Plan Design</li>
                            <li>Wedding Concept & Design</li>
                            <li>Budget Management</li>
                            <li>Security & Staffing</li>
                            <li>Tenting</li>
                            <li>Transportation & Parking</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="bg-[#761313] py-5">
            <div class="bg-gray-200 py-10">
                <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-8 md:grid-cols-2">
                    <!-- Image Section -->
                    <div class="flex justify-center">
                        <img 
                            class="w-[300px] shadow-md md:ml-[50px] md:mt-[50px]" 
                            src="{{ asset('img/wed.jpg') }}" 
                            alt="Wedding Services Image"
                        >
                    </div>
        
                    <!-- Text Section -->
                    <div>
                        <h2 class="font-serif text-[32px] text-[#761313] md:mt-0">WEDDING SERVICES</h2>
                        <ol class="mt-5 list-disc space-y-2 pl-5 text-[20px] text-gray-800">
                            <li>Ceremony & Reception Coordination</li>
                            <li>Rehearsal Dinner Coordination</li>
                            <li>Rentals & Vendor Coordination</li>
                            <li>Wedding Day Timeline</li>
                            <li>Floor Plan Design</li>
                            <li>Wedding Concept & Design</li>
                            <li>Budget Management</li>
                            <li>Security & Staffing</li>
                            <li>Tenting</li>
                            <li>Transportation & Parking</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        


        <div class="mt-[80px]">
            <h2 class="font-lateef text-center text-[32px]">Returned to Reality</h2>
            <h2 class="font-lateef pt-[5px] text-center text-[48px]">By Pearl Princess</h2>
        </div>

        {{-- <div class="mt-[60px] grid grid-cols-3 place-items-center gap-6 text-[#761313]">
            <div class="flex flex-col items-center">
                <p class="mb-2">Dulaj + Rasika | Asian Wedding</p>
                <a href="{{ route('dulaj') }}">
                    <img class="w-[300px]" src="{{ asset('..\img\IMG-0543.jpg') }}" alt="Dulaj's Couple Photo">
                </a>
            </div>
        
            <div class="flex flex-col items-center">
                <p class="mb-2">Loshitha + Buddhi | Indian Wedding</p>
                <a href="{{ route('loshitha') }}">
                    <img class="w-[300px]" src="{{ asset('..\img\Loshitha_Budhdhi.jpg') }}" alt="Loshitha's Couple Photo">
                </a>
            </div>
        
            <div class="flex flex-col items-center">
                <p class="mb-2">Sasiruwan + Nethmi | Western Wedding</p>
                <a href="{{ route('sasiruwan') }}">
                    <img class="w-[300px]" src="{{ asset('..\img\Sasiruwan_Nethmi.jpg') }}" alt="Sasiruwan's Couple Photo">
                </a>
            </div>
        </div> --}}

        <div class="mt-16 grid grid-cols-1 gap-10 px-6 text-[#761313] md:grid-cols-3 md:place-items-center md:gap-6">
            <!-- Dulaj + Rasika Section -->
            <div class="flex flex-col items-center text-center">
                <p class="mb-2 font-semibold">Dulaj + Rasika | Asian Wedding</p>
                <a href="{{ route('dulaj') }}">
                    <img 
                        class="w-[300px] shadow-md transition-transform duration-300 hover:scale-105" 
                        src="{{ asset('img/IMG-0543.jpg') }}" 
                        alt="Dulaj's Couple Photo"
                    >
                </a>
            </div>
        
            <!-- Loshitha + Buddhi Section -->
            <div class="flex flex-col items-center text-center">
                <p class="mb-2 font-semibold">Loshitha + Buddhi | Indian Wedding</p>
                <a href="{{ route('loshitha') }}">
                    <img 
                        class="- w-[300px] shadow-md transition-transform duration-300 hover:scale-105" 
                        src="{{ asset('img/Loshitha_Budhdhi.jpg') }}" 
                        alt="Loshitha's Couple Photo"
                    >
                </a>
            </div>
        
            <div class="flex flex-col items-center text-center">
                <p class="mb-2 font-semibold">Sasiruwan + Nethmi | Western Wedding</p>
                <a href="{{ route('sasiruwan') }}">
                    <img 
                        class="w-[300px] shadow-md transition-transform duration-300 hover:scale-105" 
                        src="{{ asset('img/Sasiruwan_Nethmi.jpg') }}" 
                        alt="Sasiruwan's Couple Photo"
                    >
                </a>
            </div>
        </div>
        
        
        <div class="mb-[70px]">
            <h2 class="font-josefin-slab mt-[80px] text-center text-[38px]">Planning an event? We are here...</h2>
            <div class="flex items-center justify-center">
                <a href="{{ route('bookings.store') }}">
                    <button class="mt-[50px] h-[60px] w-[200px] transform bg-[#E7892C] font-serif text-[24px] text-white transition duration-500 ease-in-out hover:scale-105"> 
                        Contact Us
                    </button>
                 </a>
            </div>
        </div>
    </section>
</body>
@endsection