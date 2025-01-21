@extends('layout')
@section('content')

<body class="m-0">
    
    <section>
        <div class="h-[100px]"></div>
        
        <div class="ml-[100px] mt-[50px]">
            <p class="font-serif text-[16px]">9 August 2023 &nbsp;&nbsp;|&nbsp;&nbsp; By Pearl Princess Events</p>
            <p class="font-k2d text-[28px]">Loshitha + Budhdhi's Western Wedding</p>
        </div>
        <img class="relative ml-[170px] mt-[40px] h-[450px]" src="{{ asset('..\img\Loshitha_Budhdhi.jpg')}}">
        
        <div class="flex grid-cols-2">
            <div class="ml-[170px] mt-[100px]">
                <p class="font-k2d pb-[25px] text-[32px] text-[#E7892C]">WEDDING DETAILS</p>
                <p class="pb-[8px] font-thin">Photography: Krishan Krish Photography</p>
                <p class="pb-[8px] font-thin">Flora: Pearl Princess Events</p>
                <p class="pb-[8px] font-thin">Groom Outfit: Grooms Art</p>
                <p class="pb-[8px] font-thin">Lehenga: ZeeL Sarees</p> 
                <p class="pb-[8px] font-thin">Dressing: Salon Lanka Fernando</p>
                <p class="pb-[8px] font-thin">Cake: Bread Master</p>
                <p class="pb-[8px] font-thin">Mehendi: Farhath's Mehendi</p>
                <p class="pb-[8px] font-thin">Entertainment: Dj Chill</p>
                <p class="pb-[8px] font-thin">Vanue: Sherwood by The Barn</p>
                <p class="pb-[8px] font-thin">Planning: Ashan De Silva</p>
            </div>

            <div class="ml-[170px] mt-[100px]">
                <img class="w-[350px]" src="{{ asset('..\img\FB_IMG_1723005377595.jpg')}}">
            </div>
        </div>

        <diV class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\FB_IMG_1723005389377.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\FB_IMG_1723005402484.jpg')}}"></div>
            <div class="w-[280px]"><img class="" src="{{ asset('..\img\FB_IMG_1723005406129.jpg')}}"></div>
        </diV>


        <diV class="ml-[170px] mr-[170px] mt-[50px] flex w-[900px] grid-cols-3 gap-10 p-[20px]">
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\FB_IMG_1723005384034.jpg')}}"></div>
            <div class="w-[500px]"><img class="" src="{{ asset('..\img\FB_IMG_1723005399852.jpg')}}"></div></div>
        </diV>


        <diV class="ml-[170px] mr-[170px] flex w-[900px] gap-10 p-[20px]">
            <div class="w-[900px]"><img class="" src="{{ asset('..\img\FB_IMG_1723005382070.jpg')}}"></div>
        </diV>

        <div class="ml-[170px] mr-[170px] flex w-[900px] grid-cols-3 grid-rows-2 gap-10 p-[20px]">
            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\lbw.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\bl.jpg')}}"></div>
            </div>

            <div class="flex flex-col gap-[60px]">
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\lb.jpg')}}"></div>
                <div class="w-[450px]"><img class="" src="{{ asset('..\img\upblw.jpg')}}"></div>
            </div>
        </div>
    </section>
</body>
@endsection