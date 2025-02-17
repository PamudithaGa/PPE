<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- splay=swap" rel="stylesheet" /> --}}

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts from Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-slate-900">
            <div>
                {{-- <a href="/" wire:navigate>
                    <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
                </a> --}}
                <a href="{{ route('home') }}">
                    <img class="h-[150px] w-[200px]" src="{{ asset('img/pp-01-removebg.png') }}" alt="Logo">
                </a>
            </div>

        
            <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>






{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Tailwind CSS CDN -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- Scripts from Vite -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900"> --}}
            {{-- <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
                </a>
                <a href="{{ route('home') }}">
                    <img class="h-[150px] w-[200px]" src="{{ asset('img/pp-01-removebg.png') }}" alt="Logo">
                </a>
            </div> 
            <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
                {{ $slot }}
            </div>
        </div>
    </body>
</html> --}}