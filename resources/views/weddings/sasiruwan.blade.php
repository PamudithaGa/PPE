@extends('layout')
@section('content')

<body class="m-0">
    <section>
        <div class="h-[100px]"></div>
        
        <div class="ml-[100px] mt-[50px]">
            <p class="font-serif text-[16px]">15 Novenmber 2023 &nbsp;&nbsp;|&nbsp;&nbsp; By Pearl Princess Events</p>
            <p class="font-k2d text-[28px]">Sasiruwan + Nethmi's Western Wedding</p>
        </div>
        <img class="relative ml-[170px] mt-[40px] h-[450px]" src="{{ asset('..\img\Sasiruwan_Nethmi.jpg')}}">
        
        <div class="flex grid-cols-2">
            <div class="ml-[170px] mt-[100px]">
                <p class="font-k2d pb-[25px] text-[32px] text-[#E7892C]">WEDDING DETAILS</p>
                <p class="pb-[8px] font-thin">Photography: Piyumal Sachintha Photography</p>
                <p class="pb-[8px] font-thin">Flora: Pearl Princess Events</p>
                <p class="pb-[8px] font-thin">Suit: </p>
                <p class="pb-[8px] font-thin">Dress: Dress By Uma</p>
                <p class="pb-[8px] font-thin">Cake: Bread Master</p>
                <p class="pb-[8px] font-thin">Make Up: Uma Saloon</p>
                <p class="pb-[8px] font-thin">Entertainment: Dj Chill</p>
                <p class="pb-[8px] font-thin">Vanue: Sherwood by The Barn</p>
                <p class="pb-[8px] font-thin">Planning: Dimli Sandaruwini</p>
            </div>

            <div class="ml-[170px] mt-[100px]">
                <img class="w-[350px]" src="{{ asset('..\img\sasi.jpg')}}">
            </div>
        </div>

        <diV class="ml-[170px] mr-[170px] mt-[50px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\nupini.jpg')}}"></div>
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\FB_IMG_1723004351881.jpg')}}"></div></div>
        </diV>

        <diV class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\FB_IMG_1723004315486.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\FB_IMG_1723004284490.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\Screenshot_20240901-161358~2.png')}}"></div>
        </diV>

        <diV class="ml-[170px] mr-[170px] flex w-[900px] gap-10 p-[20px]">
            <div class="w-[900px]"><img class="" src="{{ asset('..\img\FB_IMG_1723004252795.jpg')}}"></div>
        </diV>

        <div class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 grid-rows-2 gap-10 p-[20px]">
            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\FB_IMG_1723004266034.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\Screenshot_20240901-161407~2.png')}}"></div>
            </div>

            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\Screenshot_20240901-161417~2.png')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\FB_IMG_1723004277981.jpg')}}"></div>
            </div>
        </div>
    </section>
</body>
@endsection