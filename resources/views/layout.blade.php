<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pearl Princess Events' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/myscripts.js') }}" defer></script>
    <Script src="https://cdn.tailwindcss.com"></Script>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: '#da373d',
              },
              fontFamily: {
                'just-another-hand': ['"Just Another Hand"', 'cursive'],
                'julius-sans-one': ['"Julius Sans One"', 'sans-serif'],
                'righteous-regular':['"Righteous", sans-serif'],
                'inconsolata': ['"Inconsolata"', 'monospace'],
                'josefin-slab': ['"Josefin Slab"', 'serif'],
                'righteous': ['"Righteous"', 'sans-serif'],
                'k2d': ['"K2D"', 'sans-serif'],
                'lateef': ['"Lateef"', 'serif'],
                },
            },
          },
        };
      </script>
</head>

<body class="m-0">
    <header class="m-0">
        <nav class="fixed z-10 flex h-[80px] w-full items-center justify-between bg-slate-900 px-8 text-white shadow-lg">
            <a href="{{ route('home') }}">
                <img class="h-[70px] w-[100px]" src="{{ asset('img/pp-01-removebg.png') }}" alt="Logo">
            </a>
    
            <button class="focus:outline-none md:hidden" onclick="toggleMobileMenu()" aria-label="Toggle Menu">
                <i class="fas fa-bars text-2xl text-white"></i>
            </button>
    
            <ul class="hidden space-x-8 md:flex">
                <li class="inline-block font-serif text-white hover:border-b-2 hover:border-[#E7892C] hover:text-gray-200">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="inline-block font-serif text-white hover:border-b-2 hover:border-[#E7892C] hover:text-gray-200">
                    <a href="{{ route('offerings') }}">Offerings</a>
                </li>
                <li class="group relative">
                    <button 
                        class="cursor-pointer font-serif hover:border-b-2 hover:border-[#E7892C] hover:text-gray-200 focus:outline-none"
                        aria-haspopup="true" aria-expanded="false">
                        Events
                    </button>
                    <ul 
                        class="absolute left-0 mt-2 hidden w-48 rounded-md bg-white p-2 text-slate-900 shadow-lg group-focus-within:block group-hover:block"
                        aria-label="submenu">
                        <li class="p-2 font-serif hover:bg-gray-100">
                            <a href="{{ route('weddings') }}">Weddings</a>
                        </li>
                        <li class="p-2 font-serif hover:bg-gray-100">
                            <a href="{{ route('weddings') }}">Social Gathering</a>
                        </li>
                        <li class="p-2 font-serif hover:bg-gray-100">
                            <a href="{{ route('weddings') }}">Corporate Events</a>
                        </li>
                    </ul>
                </li>
                <li class="inline-block font-serif text-white hover:border-b-2 hover:border-[#E7892C] hover:text-gray-200">
                    <a href="{{ route('bookings.store') }}">Booking</a>
                </li>
            </ul>
    
            <div class="hidden space-x-4 md:flex">
                <a 
                    href="{{ route('eventPage') }}" 
                    class="flex h-[45px] w-[125px] items-center justify-center rounded-md bg-white text-center font-serif font-semibold text-slate-900 shadow-md hover:bg-gray-200"
                >
                    Upcomings
                </a>
            </div>
    
            <div class="hidden space-x-4 md:flex">
                <a href="{{ route('cart.index') }}">
                    <img 
                        class="h-[40px] w-[40px] hover:opacity-80" 
                        src="{{ asset('img/cart-shopping-solid.svg') }}" 
                        alt="Cart"
                    />
                </a>
                <a href="{{ route('dashboard') }}">
                    <img 
                        class="h-[40px] w-[40px] hover:opacity-80" 
                        src="{{ asset('img/user.png') }}" 
                        alt="Account"
                    />
                </a>
            </div>
        </nav>
    
        <div id="mobileMenu" class="fixed inset-0 z-20 hidden bg-slate-900 bg-opacity-90 md:hidden">
            <ul class="flex flex-col items-center justify-center space-y-6 font-serif text-xl text-white">
                <li><a href="{{ route('home') }}" class="hover:text-gray-300">Home</a></li>
                <li><a href="{{ route('offerings') }}" class="hover:text-gray-300">Offerings</a></li>
                <li><a href="{{ route('weddings') }}" class="hover:text-gray-300">Events</a></li>
                <li><a href="{{ route('bookings.store') }}" class="hover:text-gray-300">Booking</a></li>
                <li><a href="{{ route('eventPage') }}" class="hover:text-gray-300">Upcomings</a></li>
                <li><a href="{{ route('cart.index') }}" class="hover:text-gray-300">Cart</a></li>
                <li><a href="{{ route('userdashboard') }}" class="hover:text-gray-300">Account</a></li>
            </ul>
        </div>
    </header>
    

    
    <main>
        @yield('content')
    </main>


    <footer class="bg-black py-10">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between space-y-8 px-8 md:flex-row md:space-y-0">
            <div class="text-center md:text-left">
                <img class="w-[200px]" src="{{ asset('img/logoImg-removebg-preview.png') }}" alt="Pearl Princess Events Logo">
            </div>
    
            <div class="flex flex-col items-center justify-center text-center md:items-start md:text-left">
                <p class="text-white">To get details about special events & offers</p>
                <input 
                    class="mt-2 w-full border-b-2 border-white bg-transparent p-2 text-white placeholder-gray-400 focus:outline-none md:w-auto" 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Type your email here">
            </div>
    
            <div class="flex flex-col items-center space-y-4 text-center md:items-start md:text-left">
                <h2 class="text-lg text-white">Contact</h2>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                        <img class="h-[50px] w-[50px] hover:opacity-80" src="{{ asset('img/Facebook_Logo_2023.png') }}" alt="Facebook">
                    </a>
                    <a href="mailto:info@pearlprincess.com">
                        <img class="h-[50px] w-[50px] hover:opacity-80" src="{{ asset('img/gmail-icon-free-png.png') }}" alt="Gmail">
                    </a>
                    <a href="tel:+123456789">
                        <img class="h-[55px] w-[55px] hover:opacity-80" src="{{ asset('img/phone.png') }}" alt="Phone">
                    </a>
                </div>
            </div>
        </div>
    
        <div class="mt-8 text-center">
            <h2 class="text-sm text-white">&copy; 2024 Pearl Princess Events. All rights reserved.</h2>
        </div>
    </footer>
    <script>
    function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.toggle('hidden');
}

    </script>
</body>
</html>
