@extends('layout')
@section('content')

<body class="m-0">
    <section>
        <div class="h-[100px]"></div>
        
        <div class="ml-[100px] mt-[50px]">
            <p class="font-serif text-[16px]">23 March 2024 &nbsp;&nbsp;|&nbsp;&nbsp; By Pearl Princess Events</p>
            <p class="font-k2d text-[28px]">Dulaj + Rasika's Asian Type Wedding</p>
        </div>
        <img class="relative ml-[170px] mt-[40px] h-[450px]" src="{{ asset('..\img\IMG-0543.jpg')}}">
        
        <div class="flex grid-cols-2">
            <div class="ml-[170px] mt-[100px]">
                <p class="font-k2d pb-[25px] text-[32px] text-[#E7892C]">WEDDING DETAILS</p>
                <p class="pb-[8px] font-thin">Photography: Nadun Lakmina Photography</p>
                <p class="pb-[8px] font-thin">Flora: Goldern Flora</p>
                <p class="pb-[8px] font-thin">Suit: Namal Balachandra</p>
                <p class="pb-[8px] font-thin">Dress: Dress By Uma</p>
                <p class="pb-[8px] font-thin">Cake: Sadu Cake Creation</p>
                <p class="pb-[8px] font-thin">Make Up: Indu Saloon</p>
                <p class="pb-[8px] font-thin">Entertainment: Dick J Dj</p>
                <p class="pb-[8px] font-thin">Vanue: Sudu Araliya Hotel</p>
                <p class="pb-[8px] font-thin">Planning: Supeshala Kavinda</p>
            </div>

            <div class="ml-[170px] mt-[100px]">
                <img class="w-[350px]" src="{{ asset('..\img\IMG-0537.jpg')}}">
            </div>
        </div>

        <diV class="ml-[170px] mr-[170px] mt-[50px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\IMG-0501.jpg')}}"></div>
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\IMG-0558.jpg')}}"></div></div>
        </diV>

        <diV class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\IMG-0506.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\IMG-0533.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\IMG-0520.jpg')}}"></div>
        </diV>

        <diV class="ml-[170px] mr-[170px] flex w-[900px] gap-10 p-[20px]">
            <div class="w-[900px]"><img class="" src="{{ asset('..\img\IMG-0525.jpg')}}"></div>
        </diV>

        <div class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 grid-rows-2 gap-10 p-[20px]">
            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0505.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0517.jpg')}}"></div>
            </div>

            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0569.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\IMG-0059.jpg')}}"></div>
            </div>
        </div>
    </section>  
</body>
@endsection