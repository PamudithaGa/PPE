@extends('layout')

@section('content')

<body class="m-0">
    <!-- Hero Section -->
    <div class="pb-[200px]">
    <div class="relative">
        <img class="h-[820px] w-full" src="{{ asset('../img/heroa.jpg') }}" alt="Hero Image">
        <img class="justify-centerh-[350px] absolute left-[50%] top-[75%] flex h-[350px] w-[650px] -translate-x-[50%] -translate-y-[50%] transform items-center" src="{{ asset('../img/pp-01-removebg.png') }}" alt="Logo">
        <h2 class="mt-[-350px] text-center font-mono text-[26px] text-white">An Identity Of Infinite Memories</h2>
    </div>

    <a href="{{ route('bookings.store') }}">
        <button class="relative left-[43%] mt-20 flex h-[50px] w-[270px] cursor-pointer items-center justify-center border-none bg-[#ffffff] font-serif text-[30px] text-slate-900 shadow-md transition duration-500 ease-in-out hover:scale-105">
            Plan Your Day
        </button>
    </a>
    </div>
    
    <!-- About Section -->
    <div class="w-full bg-gray-200 p-[70px]">
        <h2 class="mb-[30px] text-center font-mono text-[24px]">UNFORGETTABLE, PERSONALIZED, LUXURY</h2>
        <h2 class="pb-[30px] text-center text-[34px] font-bold">Pearl Princess Events</h2>
        <p class="mx-auto max-w-4xl text-center text-[18px] font-thin leading-[1.9]">
            Our mission is to transform your special day into an extraordinary experience filled with unforgettable memories and unparalleled efficiency. From intimate gatherings to grand events, our comprehensive event planning services are available throughout Sri Lanka, ensuring that every event we plan is tailored to your individual needs and desires. We are committed to executing any type of event with the utmost professionalism and creativity, bringing your vision to life in the most spectacular way possible.<br><br>
            Our dedicated team goes above and beyond to provide exceptional service and innovative solutions, ensuring every detail is perfect and every moment is cherished.
        </p>

        <!-- Call Us Button -->
        <div class="mt-10 flex justify-center">
            <a href="tel:+94726442538">
                <button class="flex h-[50px] w-[250px] cursor-pointer items-center justify-center border-none bg-[#ffffff] font-serif text-[28px] text-slate-900 shadow-md">
                    CALL US
                </button>
            </a>
        </div>
    </div>

    <!--Events-->
    <div class="pb-[125px] pt-[155px]">
        <div class="grid grid-cols-3 place-items-center pb-[40px]">
            <div class="">
                <h2 class="font-mono text-[32px] text-slate-900">WEDDINGS</h2>
            </div>
        
            <div class="">
                <h2 class="font-mono text-[32px] text-slate-900">SOCIAL GATHERINGS</h2>
            </div>
    
            <div class="">
               <h2 class="font-mono text-[32px] text-slate-900">CORPORATE EVENTS</h2>
            </div>
        </div>
    
        <div class="grid grid-cols-3 place-items-center gap-[20px]">
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
    
            <div class="group relative h-[270px] w-[270px]">
                <img class="h-full w-full object-cover" src="..\img\copoeve.jpg" alt="">
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
                <!-- Venue Card -->
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="../img/vanue.jpg" alt="Venue">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Venues</h3>
                    </div>
                </div>
        
                <!-- Photography Card -->
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="../img/photography.jpg" alt="Photography">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Imaging</h3>
                    </div>
                </div>

                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="../img/shanAudi.jpg" alt="Flowers">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Vehicles</h3>
                    </div>
                </div>
        
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="../img/dinesh.jpg" alt="Recreation">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Recreation</h3>
                    </div>
                </div>
                
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="../img/flowers.jpg" alt="Flowers">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Decorations</h3>
                    </div>
                </div>

                <!-- Catering Card -->
                <div class="scroll-snap-align-start group relative h-[420px] w-[260px] flex-shrink-0 overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                    <img class="h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110" src="../img/catering.jpg" alt="Catering">
                    <div class="absolute inset-0 flex items-end bg-black bg-opacity-40 p-4 transition duration-300">
                        <h3 class="text-lg font-bold text-white">Catering</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    
    
    <!--crew-->
    <div class="items-center pb-[60px] pt-[135px]">
        <h2 class="ml-[80px] text-center font-serif text-[36px]">Our Professioners</h2>
        <div class="mt-[30px] grid grid-cols-5 place-items-center">
            <div class="group relative flex h-[180px] w-[180px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[170px] w-[170px] overflow-hidden rounded-full">
                    <img class="h-[170px] w-[170px] rounded-full" src="..\img\dineshAravinda.jpg" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Dinesh Aravinda
                </div>
            </div>
            <div class="group relative flex h-[200px] w-[200px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[190px] w-[190px] overflow-hidden rounded-full">
                    <img class="h-[190px] w-[190px] rounded-full" src="..\img\ashanDeSilva.jpg" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Ashan De Silva
                </div>
            </div>
            <div class="group relative flex h-[220px] w-[220px] items-center justify-center rounded-full bg-[#E7892C]">
                <div class="h-[210px] w-[210px] overflow-hidden rounded-full">
                    <img class="h-[210px] w-[210px] rounded-full" src="..\img\buddikaIdamgedara.jpg" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Buddika Idamgedara
                </div>
            </div>
            

            <div class="group relative flex h-[200px] w-[200px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[190px] w-[190px] overflow-hidden rounded-full">
                    <img class="h-[190px] w-[190px] rounded-full" src="..\img\thamaraSamaravikrama.jpg" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    T Samaravikrama
                </div>
            </div>

            <div class="group relative flex h-[180px] w-[180px] items-center justify-center rounded-full bg-[#717999]">
                <div class="h-[170px] w-[170px] overflow-hidden rounded-full">
                    <img class="h-[170px] w-[170px] rounded-full"src="..\img\eshan.jpg" alt="">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 text-center text-lg font-semibold text-black opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    Eshan Dineth
                </div>
            </div>
        </div>
        
        <p class="ml-[100px] mr-[90px] mt-[50px] text-center text-[24px] font-thin">Experience the perfect blend of 
            user-friendly service and professional expertise, where every detail is handled with care, and every 
            interaction leaves you feeling valued and confident.
        </p>
    </div>

    <!--image-->
    <div class="relative mt-[100px] bg-[#717999] pb-[100px] pt-[50px]">
        <h2 class="font-just-another-hand pl-[100px] pt-[30px] text-[60px] text-white">Need help planning your event?</h2>
        <h2 class="font-julius-sans-one pl-[210px] pt-[20px] text-[55px] text-white">WE ARE HERE TO HELP YOU.</h2>
        <h2 class="pl-[70px] font-serif text-[20px] text-white">Discuss with experts with years of experience in the field and get your <br> wishes fulfilled.</h2>
        <div class="flex items-center justify-center">
            <a href="tel:+94726442538"><button class="ml-64px mt-12 h-16 w-64 transform bg-[#E7892C] font-serif text-2xl font-light text-white transition duration-500 ease-in-out hover:scale-105">CONTACT US</button></a>
        </div>
        <div class="absolute inset-0 flex items-end justify-end">
            <img class="h-[450px]" src="..\img\flower.png" alt="Flower">
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
        <!-- Card 1 -->
        <div class="group relative h-96 w-72 overflow-hidden rounded-lg shadow-lg">
          <img src="..\img\cus.jpg" alt="Wedding Dress" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110">
          <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-center text-white">
            <p class="text-sm font-semibold uppercase">Cloth</p>
            <h3 class="mt-2 text-xl font-bold">Wedding Dress Collection</h3>
            <a href="{{ route('offerings') }}" class="mt-4 rounded bg-yellow-400 px-4 py-2 font-semibold text-black transition hover:bg-yellow-500">SHOP NOW</a>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="group relative h-96 w-72 overflow-hidden rounded-lg shadow-lg">
          <img src="..\img\jwel.jpg" alt="Wedding Jewellery" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110">
          <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-center text-white">
            <p class="text-sm font-semibold uppercase">Jewellery</p>
            <h3 class="mt-2 text-xl font-bold">Wedding Jewellery Collection</h3>
            <a href="{{ route('offerings') }}" class="mt-4 rounded bg-yellow-400 px-4 py-2 font-semibold text-black transition hover:bg-yellow-500">SHOP NOW</a>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="relative flex h-96 w-72 flex-col items-center justify-center rounded-lg bg-yellow-400 text-center text-black shadow-lg">
          <p class="text-sm font-semibold uppercase">Up to 70% off in Jewellery</p>
          <h3 class="mt-2 text-xl font-bold">Wedding Jewellery Collection</h3>
          <a href="{{ route('offerings') }}" class="mt-4 rounded bg-black px-4 py-2 font-semibold text-white transition hover:bg-gray-800">BROWSE SALES</a>
        </div>
      </div>


    
    
    <!--trips-->
    
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
<div class="bg-gray-200 pb-[50px] pt-[75px]">
    <h2 class="ml-[100px] font-mono text-[44px]">SUBSCRIPTION</h2>
    <p class="ml-[200px] mt-[30px] text-[21px] font-light">
        Subscribing to our event planning service ensures exclusive access to premium features,<br> 
        personalized event consultations, priority booking, and special discounts on all our offerings.<br>
        Subscribers receive dedicated support and tailored recommendations, guaranteeing a seamless and<br>
        unforgettable event experience. <br><br>
        Enjoy unparalleled convenience and peace of mind with our comprehensive subscription plans.
    </p>

    @auth
        <div class="flex justify-center">
            <a href="javascript:void(0);" id="openModal">
                <button class="mt-[95px] flex h-[50px] w-[250px] cursor-pointer items-center justify-center border-none bg-[#ffffff] font-serif text-[28px] text-slate-900 shadow-md">
                    SUBSCRIBE
                </button>
            </a>
        </div>

        <div id="subscriptionModal" class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="relative w-full max-w-sm rounded-lg bg-white p-8 shadow-2xl">
                <button id="closeModal" class="absolute right-2 top-2 text-2xl text-gray-600">
                    &times;
                </button>
                <h2 class="mb-6 text-center text-2xl font-semibold text-gray-700">Subscribe Now</h2>
                <form id="subscriptionForm">
                    <label class="mb-2 block text-gray-600">Full Name</label>
                    <input type="text" name="name" class="mb-4 w-full rounded-lg border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"  value="{{ auth()->user()->name ?? '' }}"  required>
                    <label class="mb-2 block text-gray-600">Email Address</label>
                    <input type="email" name="email" class="mb-4 w-full rounded-lg border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ auth()->user()->email ?? '' }}"  required>
                    <label class="mb-2 block text-gray-600">Choose Plan</label>
                    <select name="plan" class="mb-4 w-full rounded-lg border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="basic">Basic - LKR 10000</option>
                    </select>
                    <div id="card-element" class="mb-6 rounded-lg border border-gray-300 p-4"></div>
                    <button type="submit" class="w-full rounded-lg bg-green-600 py-3 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="flex justify-center">
            <button class="mt-[95px] flex h-[50px] w-[300px] items-center justify-center bg-red-600 font-serif text-[20px] text-white">
                <a href="{{ route('login') }}">Please log in to subscribe.</a>
            </button>
        </div>
    @endauth
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();

    // Create a card element
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

    openModal.addEventListener('click', () => {
        subscriptionModal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
        subscriptionModal.classList.add('hidden');
    });

    // Handle form submission
    const form = document.getElementById('subscriptionForm');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Create a Payment Method using the card
        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: card,
            billing_details: {
                name: form.name.value,
                email: form.email.value,
            },
        });

        if (error) {
            // Display error to the user
            alert(error.message);
        } else {
            // Send the payment method to the backend
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
                        alert(data.message); // Show success message
                        subscriptionModal.classList.add('hidden'); // Close the modal
                    } else {
                        alert('Error: ' + data.error); // Show error message
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        }
    });
</script>

            
            
    </div>
</body>

@endsection 