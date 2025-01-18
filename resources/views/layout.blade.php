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
        <nav class="fixed z-10 flex h-[80px] w-full cursor-pointer items-center justify-between border-none bg-slate-900 px-8 text-white shadow-lg">
            <img class="h-[100px] w-[150px]" src="{{ asset('img/pp-01-removebg.png') }}" alt="Logo">

            <button class="md:hidden" onclick="toggleMobileMenu()">
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
                        class="cursor-pointer font-serif hover:border-b-2 hover:border-[#E7892C] hover:text-gray-200"
                        aria-haspopup="true" aria-expanded="false">
                        Events
                    </button>
                    <ul 
                        class="absolute left-0 mt-2 hidden w-48 rounded bg-white p-2 text-slate-900 shadow-lg group-focus-within:block group-hover:block"
                        aria-label="submenu">
                        {{-- <li class="p-2 font-serif hover:bg-gray-100">
                            <a href="{{ route('eventPage') }}">Upcoming Events</a>
                        </li> --}}
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
                
            <div class="flex space-x-4">
                <button class="h-[45px] w-[125px] rounded-md border-none bg-white font-serif font-semibold text-slate-900 shadow-md hover:bg-gray-200">
                    <a href="{{ route('eventPage') }}">Upcomings</a>
                </button>

            </div>

            <div class="hidden space-x-4 md:flex">
                <a href=""><img class="h-[40px] w-[40px] hover:opacity-80" src="{{ asset('img/cart-shopping-solid.svg') }}" alt="Cart"></a>
                <a href="{{ route('dashboard') }}"><img class="h-[40px] w-[40px] hover:opacity-80" src="{{ asset('img/user.png') }}" alt="Account"></a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-black py-10">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-8">
            <div>
                <img class="w-[200px]" src="{{ asset('img/logoImg-removebg-preview.png') }}" alt="">
            </div>

            <div class="flex flex-col justify-center">
                <p class="text-white">To get details about special events & offers</p>
                <input class="mt-2 border-none bg-transparent" type="email" id="email" name="email" placeholder="Type here Your Email">
                <div class="mt-2 h-[2px] w-full bg-white"></div>
            </div>

            <div class="flex flex-col items-start justify-center space-y-2">
                <h2 class="mb-4 text-lg text-white">Contact</h2>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com"><img class="h-[50px] w-[50px]" src="{{ asset('img/Facebook_Logo_2023.png') }}" alt="Facebook"></a>
                    <img class="h-[50px] w-[50px]" src="{{ asset('img/gmail-icon-free-png.png') }}" alt="Gmail">
                    <img class="h-[55px] w-[55px]" src="{{ asset('img/phone.png') }}" alt="Phone">
                </div>
            </div>
        </div>
        <div class="mt-[50px] text-center">
            <h2 class="text-white"> &copy; 2024 Pearl Princess Events. All rights reserved</h2>
        </div>
    </footer>
</body>
</html>
