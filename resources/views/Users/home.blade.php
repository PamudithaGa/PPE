@extends('layout')

@section('content')

<body class="m-0">
    <div class="pb-[200px]">
    <div class="relative">
        <img class="h-[820px] w-full object-cover" src="{{ asset('../img/heroa.jpg') }}" alt="Hero Image">
        <img class="justify-centerh-[350px] absolute left-[50%] top-[75%] flex h-[350px] w-[650px] -translate-x-[50%] -translate-y-[50%] transform items-center" src="{{ asset('../img/pp-01-removebg.png') }}" alt="Logo">
        <h2 class="mt-[-350px] text-center font-mono text-[26px] text-white">An Identity Of Infinite Memories</h2>
    </div>

    <a href="{{ route('bookings.store') }}">
        <button class="relative left-12 mt-20 flex h-12 w-72 cursor-pointer items-center justify-center border-none bg-[#ffffff] font-serif text-[30px] text-slate-900 shadow-md transition duration-500 ease-in-out hover:scale-105 lg:left-[43%]">
            Plan Your Day
        </button>
    </a>
    </div>

    <div class="w-full bg-gray-200 p-[70px]">
        <h2 class="mb-[30px] text-center font-mono text-[24px]">UNFORGETTABLE, PERSONALIZED, LUXURY</h2>
        <h2 class="pb-[30px] text-center text-[34px] font-bold">Pearl Princess Events</h2>
        <p class="mx-auto max-w-4xl text-center text-[18px] font-thin leading-[1.9]">
            Our mission is to transform your special day into an extraordinary experience filled with unforgettable memories and unparalleled efficiency. From intimate gatherings to grand events, our comprehensive event planning services are available throughout Sri Lanka, ensuring that every event we plan is tailored to your individual needs and desires. We are committed to executing any type of event with the utmost professionalism and creativity, bringing your vision to life in the most spectacular way possible.<br><br>
            Our dedicated team goes above and beyond to provide exceptional service and innovative solutions, ensuring every detail is perfect and every moment is cherished.
        </p>

        <div class="mt-10 flex justify-center">
            <a href="tel:+94726442538">
                <button class="flex h-[50px] w-[250px] cursor-pointer items-center justify-center border-none bg-[#ffffff] font-serif text-[28px] text-slate-900 shadow-md">
                    CALL US
                </button>
            </a>
        </div>
    </div>

    <div class="grid place-items-center gap-6 pb-[175px] pt-[175px] lg:grid-cols-3">
        <div class="flex flex-col items-center">
            <h2 class="font-mono text-[32px] text-slate-900">WEDDINGS</h2>
            <div class="group relative h-[270px] w-[270px]">
                <img class="h-full w-full object-cover" src="{{ asset('..\img\wedding.jpg')}}" alt="weddings">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 transition duration-300 group-hover:bg-opacity-80">
                    <div class="flex h-[70px] w-[70px] items-center justify-center rounded-full bg-slate-900 bg-opacity-0 transition duration-300 group-hover:bg-opacity-30">
                        <span class="font-mono text-[50px] text-white opacity-0 group-hover:opacity-100">
                            <a href="{{ route('weddings') }}">></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="flex flex-col items-center">
            <h2 class="font-mono text-[32px] text-slate-900">SOCIAL GATHERINGS</h2>
            <div class="group relative h-[270px] w-[270px]">
                <img class="h-full w-full object-cover" src="{{ asset('..\img\socialG.jpg')}}" alt="">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 transition duration-300 group-hover:bg-opacity-80">
                    <div class="flex h-[70px] w-[70px] items-center justify-center rounded-full bg-slate-900 bg-opacity-0 transition duration-300 group-hover:bg-opacity-30">
                        <span class="font-mono text-[50px] text-white opacity-0 group-hover:opacity-100">
                            <a href="#">></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="flex flex-col items-center">
            <h2 class="font-mono text-[32px] text-slate-900">CORPORATE EVENTS</h2>
            <div class="group relative h-[270px] w-[270px]">
                <img class="h-full w-full object-cover" src="{{ asset('..\img\copoeve.jpg')}}" alt="">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 transition duration-300 group-hover:bg-opacity-80">
                    <div class="flex h-[70px] w-[70px] items-center justify-center rounded-full bg-slate-900 bg-opacity-0 transition duration-300 group-hover:bg-opacity-30">
                        <span class="font-mono text-[50px] text-white opacity-0 group-hover:opacity-100">
                            <a href="#">></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="mt-[30px] bg-black p-[70px] pt-[40px]">
        <div class="flex items-center justify-between pb-[30px] pr-[40px] pt-[40px]">
            <h2 class="ml-[80px] inline font-serif text-[36px] text-white"><a href="{{ route('serivces') }}">Our Services</a></h2>
        </div>
        
        
        <div class="overflow-x-auto py-8">
            <div class="scroll-snap-x flex snap-mandatory justify-start space-x-6">
                
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="{{ asset('..\img\vanue.jpg')}}" alt="Venue">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Venues</h3>
                    </div>
                </div>
        
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="{{ asset('../img/photography.jpg')}}" alt="Photography">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Imaging</h3>
                    </div>
                </div>

                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="{{ asset('../img/shanAudi.jpg')}}" alt="Flowers">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Vehicles</h3>
                    </div>
                </div>
        
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="{{ asset('../img/dinesh.jpg')}}" alt="Recreation">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Recreation</h3>
                    </div>
                </div>
                
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="{{ asset('../img/flowers.jpg')}}" alt="Flowers">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Decorations</h3>
                    </div>
                </div>

                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="{{ asset('../img/catering.jpg')}}" alt="Catering">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Catering</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!--crew-->
    <div class="items-center pb-16 pt-36">
        <h2 class="text-center font-serif text-4xl font-semibold">Our Professionals</h2>
        <div class="mt-8 grid grid-cols-1 place-items-center gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            <div class="group relative flex h-[180px] w-[180px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[170px] w-[170px] overflow-hidden rounded-full">
                    <img class="h-[170px] w-[170px] rounded-full" src="{{ asset('..\img\dineshAravinda.jpg')}}" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Dinesh Aravinda
                </div>
            </div>
            <div class="group relative flex h-[200px] w-[200px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[190px] w-[190px] overflow-hidden rounded-full">
                    <img class="h-[190px] w-[190px] rounded-full" src="{{ asset('..\img\ashanDeSilva.jpg')}}" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Ashan De Silva
                </div>
            </div>
            <div class="group relative flex h-[220px] w-[220px] items-center justify-center rounded-full bg-[#E7892C]">
                <div class="h-[210px] w-[210px] overflow-hidden rounded-full">
                    <img class="h-[210px] w-[210px] rounded-full" src="{{ asset('..\img\buddikaIdamgedara.jpg')}}" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Buddika Idamgedara
                </div>
            </div>
            <div class="group relative flex h-[200px] w-[200px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[190px] w-[190px] overflow-hidden rounded-full">
                    <img class="h-[190px] w-[190px] rounded-full" src="{{ asset('..\img\thamaraSamaravikrama.jpg')}}" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    T Samaravikrama
                </div>
            </div>

            <div class="group relative flex h-[180px] w-[180px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[170px] w-[170px] overflow-hidden rounded-full">
                    <img class="h-[170px] w-[170px] rounded-full"src="{{ asset('..\img\eshan.jpg')}}" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-center text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Eshan Dineth
                </div>
            </div>
        </div>
    
        <p class="mx-auto mt-12 max-w-4xl text-center text-xl font-light">
            Experience the perfect blend of user-friendly service and professional expertise, where every detail is handled with care, and every interaction leaves you feeling valued and confident.
        </p>
    </div>

    <!--image-->
    <div class="relative mt-24 bg-[#717999] py-16">
        <h2 class="font-just-another-hand text-center text-4xl text-white sm:text-5xl lg:text-6xl">
            Need help planning your event?
        </h2>
        <h2 class="font-julius-sans-one mt-4 text-center text-3xl text-white sm:text-4xl lg:text-5xl">
            WE ARE HERE TO HELP YOU.
        </h2>
        <p class="mt-6 text-center font-serif text-base text-white sm:text-lg lg:text-xl">
            Discuss with experts with years of experience in the field and get your<br> wishes fulfilled.
        </p>
        <div class="mt-10 flex justify-center">
            <a href="tel:+94726442538">
                <button
                    class="h-16 w-64 transform bg-[#E7892C] font-serif text-xl font-light text-white transition duration-500 ease-in-out hover:scale-105">
                    CONTACT US
                </button>
            </a>
        </div>
        <div class="absolute bottom-0 right-0">
            <img class="h-[300px] md:h-[400px] lg:h-[450px]" src="{{ asset('img/flower.png') }}" alt="Flower">
        </div>
    </div>
    

    {{-- <div class="pb-[50px] pt-[90px]">
        <div class="flex items-center justify-between">
          <h2 class="ml-[80px] font-serif text-[36px]">Upcoming Events</h2>
        </div>        
        
        <div class="grid grid-cols-1 place-items-center gap-6 pl-[170px] pr-[170px] pt-10 sm:grid-cols-2 lg:grid-cols-4">     
            <!-- Repeat for other events -->
            <div class="group relative overflow-hidden shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                <img class="h-[350px] w-[250px] object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" src="../img/dancer.jpg" alt="Event Image"/>
                  
                <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-purple-700 to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                    <div class="p-4 text-white">
                        <h3 class="text-xl font-bold">SL 2 World</h3>
                        <p class="text-sm">1st January 2025</p>
                        <div class="mt-3 flex space-x-2">
                            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
        <!-- Add Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </div> --}}
    

    <div class="flex flex-wrap items-center justify-center gap-6 p-6 pb-[170px] pt-[170px]">
        <div class="group relative h-96 w-72 overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('..\img\cus.jpg')}}" alt="Wedding Dress" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-center text-white">
                <p class="text-sm font-semibold uppercase">Cloth</p>
                <h3 class="mt-2 text-xl font-bold">Wedding Dress Collection</h3>
                <a href="{{ route('offerings') }}" class="mt-4 rounded bg-yellow-400 px-4 py-2 font-semibold text-black transition hover:bg-yellow-500">SHOP NOW</a>
            </div>
        </div>
        
        <div class="group relative h-96 w-72 overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('..\img\jwel.jpg')}}" alt="Wedding Jewellery" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-center text-white">
                <p class="text-sm font-semibold uppercase">Jewellery</p>
                <h3 class="mt-2 text-xl font-bold">Wedding Jewellery Collection</h3>
                <a href="{{ route('offerings') }}" class="mt-4 rounded bg-yellow-400 px-4 py-2 font-semibold text-black transition hover:bg-yellow-500">SHOP NOW</a>
            </div>
        </div>
        
        <div class="relative flex h-96 w-72 flex-col items-center justify-center rounded-lg bg-yellow-400 text-center text-black shadow-lg">
            <p class="text-sm font-semibold uppercase">Up to 70% off in Jewellery</p>
            <h3 class="mt-2 text-xl font-bold">Wedding Jewellery Collection</h3>
            <a href="{{ route('offerings') }}" class="mt-4 rounded bg-black px-4 py-2 font-semibold text-white transition hover:bg-gray-800">BROWSE SALES</a>
        </div>
    </div>

    <div class="bg-gradient-to-r from-white to-slate-900 py-12">
        <div class="pb-[80px] pt-[35px]">
        <h2 class="text-center font-serif text-[48px]">5% OFF For Subscribers</h2>
    </div>
    
    <div class="mx-auto grid max-w-6xl grid-cols-1 gap-8 px-6 sm:grid-cols-2 lg:grid-cols-3">
        <div class="relative rounded-lg bg-white p-6 text-center shadow-lg">
                <div class="absolute inset-x-0 -top-4 flex justify-center">
                    <div class="h-4 w-full rounded-full bg-gradient-to-b from-white via-gray-200 to-white"></div>
                </div>
                <h3 class="text-lg font-semibold text-purple-700">Galle Day Out</h3>
                <p class="mt-2 text-3xl font-bold text-gray-800">LKR 27,000</p>
                <p class="mt-2 text-sm text-gray-500">3 Persons</p>
                <div class="mt-4 h-2 w-full rounded bg-gray-200">
                    <div class="h-2 rounded bg-purple-700" style="width: 100%"></div>
                </div>
                <div class="m-[7px] font-mono">
                    <h1 class="m-[7px]">Two Days</h1>
                    <h1 class="m-[7px]">Transport</h1>
                    <h1 class="m-[7px]">Breakfast</h1>
                    <h1 class="m-[7px]">Lunch</h1>
                    <h1 class="m-[7px]">Dinner</h1>
                    <h1 class="m-[7px]">Accomadation</h1>
                </div>
                <button class="mt-4 rounded bg-[#E7892C] px-4 py-2 font-semibold text-white hover:bg-pink-700">
                    Choose Plan
                </button>
            </div>
      
            <div class="relative rounded-lg bg-white p-6 text-center shadow-lg">
                <div class="absolute inset-x-0 -top-4 flex justify-center">
                    <div class="h-4 w-full rounded-full bg-gradient-to-b from-white via-gray-200 to-white"></div>
                </div>
                <h3 class="text-lg font-semibold text-purple-700">Nuwaraeliya Trip</h3>
                <p class="mt-2 text-3xl font-bold text-gray-800">LKR 69,000</p>
                <p class="mt-2 text-sm text-gray-500">8 Persons</p>
                <div class="mt-4 h-2 w-full rounded bg-gray-200">
                    <div class="h-2 rounded bg-purple-700" style="width: 100%"></div>
                </div>
                <div class="m-[7px] font-mono">
                    <h1 class="m-[7px]">Two Days</h1>
                    <h1 class="m-[7px]">Transport</h1>
                    <h1 class="m-[7px]">Breakfast</h1>
                    <h1 class="m-[7px]">Lunch</h1>
                    <h1 class="m-[7px]">Dinner</h1>
                    <h1 class="m-[7px]">Accomadation</h1>
                </div>
                <button class="mt-4 rounded bg-[#E7892C] px-4 py-2 font-semibold text-white hover:bg-pink-700">
                    Choose Plan
                </button>
            </div>
      
            <div class="relative rounded-lg bg-white p-6 text-center shadow-lg">
                <div class="absolute inset-x-0 -top-4 flex justify-center">
                     <div class="h-4 w-full rounded-full bg-gradient-to-b from-white via-gray-200 to-white"></div>
                </div>
                <h3 class="text-lg font-semibold text-purple-700">Ella Trip</h3>
                <p class="mt-2 text-3xl font-bold text-gray-800">LKR.77,000</p>
                <p class="mt-2 text-sm text-gray-500">8 Persons</p>
                <div class="mt-4 h-2 w-full rounded bg-gray-200">
                    <div class="h-2 rounded bg-purple-700" style="width: 100%"></div>
                </div>
                <div class="m-[7px] font-mono">
                    <h1 class="m-[7px]">Two Days</h1>
                    <h1 class="m-[7px]">Transport</h1>
                    <h1 class="m-[7px]">Breakfast</h1>
                    <h1 class="m-[7px]">Lunch</h1>
                    <h1 class="m-[7px]">Dinner</h1>
                    <h1 class="m-[7px]">Accomadation With Pool</h1>
                </div>
                <button class="mt-4 rounded bg-[#E7892C] px-4 py-2 font-semibold text-white hover:bg-pink-700">
                    Choose Plan
                </button>
            </div>
        </div>
    </div>
      
<!--Subscription-->
<div class="bg-gray-200 py-20">
    <h2 class="text-center font-mono text-3xl sm:text-4xl lg:text-5xl">SUBSCRIPTION</h2>
    <p class="mt-6 px-4 text-center text-sm font-light sm:text-base lg:px-32 lg:text-lg">
        Subscribing to our event planning service ensures exclusive access to premium features, 
        personalized event consultations, priority booking, and special discounts on all our offerings. 
        Subscribers receive dedicated support and tailored recommendations, guaranteeing a seamless and 
        unforgettable event experience. <br><br> Enjoy unparalleled convenience and peace of mind with 
        our comprehensive subscription plans.
    </p>

    @auth
        @php
            $subscription = \App\Models\Subscription::where('user_id', auth()->id())->latest('expires_at')->first();
            $isSubscribed = $subscription && $subscription->expires_at->isFuture();
        @endphp

        <div class="mt-10 flex justify-center">
            @if($isSubscribed)
                <button 
                    class="h-12 w-72 cursor-not-allowed items-center justify-center bg-green-600 font-serif text-lg text-white shadow-md" 
                    disabled>
                    You Have Subscribed
                </button>
            @else
                <button 
                    id="openModal" 
                    class="h-12 w-64 items-center justify-center border border-gray-400 bg-white font-serif text-xl text-gray-800 shadow-md transition hover:bg-gray-100">
                    SUBSCRIBE
                </button>
            @endif
        </div>
    @else
        <div class="mt-10 flex justify-center">
            <a href="{{ route('login') }}">
                <button 
                    class="h-12 w-72 items-center justify-center bg-red-600 font-serif text-lg text-white shadow-md transition hover:bg-red-700">
                    Please log in to subscribe.
                </button>
            </a>
        </div>
    @endauth
</div>

<!-- Modal -->
<div id="subscriptionModal" class="fixed inset-0 flex hidden items-center justify-center bg-black bg-opacity-50">
    <div class="w-[400px] rounded bg-white p-6 shadow-lg">
        <h3 class="mb-4 text-xl font-bold">Subscription Details</h3>
        <form id="subscriptionForm">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required />
            </div>
            <div class="mb-4">
                <label for="plan" class="block text-sm font-medium text-gray-700">Plan</label>
                <select id="plan" name="plan" class="w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="yearly"> Rs10,000 (Yearly Plan)</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="card-element" class="block text-sm font-medium text-gray-700">Card Details</label>
                <div id="card-element" class="rounded-md border border-gray-300 p-2"></div>
            </div>
            <div class="flex items-center justify-between">
                <button type="button" id="closeModal" class="rounded bg-red-500 px-4 py-2 text-white shadow hover:bg-red-700">Cancel</button>
                <button type="submit" class="rounded bg-green-500 px-4 py-2 text-white shadow hover:bg-green-700">Subscribe</button>
            </div>
        </form>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();

    const card = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            },
        },
    });
    card.mount('#card-element');

    const openModal = document.getElementById('openModal');
    const subscriptionModal = document.getElementById('subscriptionModal');
    const closeModal = document.getElementById('closeModal');

    openModal.addEventListener('click', () => subscriptionModal.classList.remove('hidden'));
    closeModal.addEventListener('click', () => subscriptionModal.classList.add('hidden'));

    const form = document.getElementById('subscriptionForm');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: card,
            billing_details: {
                name: form.name.value,
                email: form.email.value,
            },
        });

        if (error) {
            alert(error.message);
        } else {
            fetch('/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    paymentMethod: paymentMethod.id,
                    plan: form.plan.value,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.message) {
                        alert(data.message);
                        subscriptionModal.classList.add('hidden');
                    } else {
                        alert('Error: ' + data.error);
                    }
                })
                .catch((err) => alert('An error occurred. Please try again.'));
        }
    });
</script>

</body>

@endsection 