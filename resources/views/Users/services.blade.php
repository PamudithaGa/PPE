@extends('layout')

@section('content')

<body class="m-0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        AOS.init({
            duration: 1200, // Animation duration in milliseconds
            easing: 'ease-in-out', // Animation easing
            once: false, // Animation triggers every time you scroll up/down
        });

                // Dynamic filtering function
                function filterItems() {
            const selectedType = document.getElementById('eventType').value.toLowerCase();
            const cards = document.querySelectorAll('.filter-item');

            cards.forEach(card => {
                const category = card.dataset.category.toLowerCase();
                if (selectedType === 'all' || category === selectedType) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
    

    
    <div class="align-mid flex items-center justify-center pt-[100px] font-serif">
        <select id="eventType" name="eventType" class="w-1/4 rounded border px-3 py-2">
            <option value="all">All</option>
            <option value="venues">Venues </option>
            <option value="Photo&Video">Photography & Videography</option>
            <option value="recreation">Recreation</option>
            <option value="decorations">Decorations</option>
        </select>
    </div>

    <div>
        <p class="font-k2d ml-[60px] text-[42px] text-slate-700">VENUES</p>
    </div>
    
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-lg border bg-white shadow-md" data-category="venues">
            <img src="{{ asset('../img/barnhouse2.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/barnlogo.png') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                      <h3 class="ml-4 font-serif text-lg font-bold">THE BARNHOUSE STUDIO - PANADURA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/ruvinicover2.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/ruwiniLeasureResortKuliyapitiya.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">THE RUVINI LEISURE RESORT - KULIYAPITIYA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/anantaraKalutharacover2.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/anantaraKaluthara.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">ANANTARA RESORT - KALUTHARA </h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/CapeWeligamaResort,.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/Cape Weligama Resortlogo.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">CAPE RESORT - WALIGAMA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <p class="font-k2d ml-[60px] text-[42px] text-slate-700">PHOTOGRAPHY & VIDEOGRAPHY</p>
    </div>
    
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-lg border bg-white shadow-md" data-category="photo&video">
            <img src="{{ asset('../img/naduncover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/nadun.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                        <h3 class="ml-4 font-serif text-lg font-bold">NADUN LAKINA PHOTOGRAPHY</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/pitumalcover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/piyumal.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">PIYUMAL SACHINTHA PHOTOGRAPHY</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/lahirucover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/lahiru.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">LAHIRU THEEKSHANA PHOTOGRAPHY</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/SathishChamikaPhotogrphyCover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/SathishChamikaPhotogrphy.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">SATHISH CHAMATHKA PHOTOGRAPHY</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="relative mb-[100px] mt-[100px] h-[450px] overflow-hidden bg-[#3A3D56] shadow-xl" data-aos="fade-up">
        <!-- Decorative Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black via-[#3A3D56] to-black opacity-70"></div>
    
        <!-- Content Area -->
        <div class="relative z-10 flex h-full items-center justify-center px-6 text-center sm:px-20">
            <div>
                <h2 class="font-serif text-[40px] leading-snug text-white sm:text-[54px]" data-aos="zoom-in">
                    <span class="font-extrabold text-yellow-400">10% Discount</span> <br>
                    On Exclusive Services With <br>
                    <span class="italic">Pearl Princess</span>.
                </h2>
                <p class="mt-4 text-lg text-gray-300" data-aos="fade-up" data-aos-delay="200">
                    Make your special moments unforgettable. Book now and enjoy the exclusive offer.
                </p>
            </div>
        </div>
    
        <!-- Decorative Elements -->
        <div class="absolute left-0 top-0 h-[150px] w-[150px] rounded-full bg-yellow-400 opacity-30 blur-xl" data-aos="fade-in"></div>
        <div class="absolute bottom-0 right-0 h-[200px] w-[200px] rounded-full bg-yellow-400 opacity-20 blur-[80px]" data-aos="fade-in" data-aos-delay="300"></div>
    </div>

    <div>
        <p class="font-k2d ml-[60px] text-[42px] text-slate-700">RECREATION</p>
    </div>
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-lg border bg-white shadow-md" data-category="recreation">
            <img src="{{ asset('../img/oriyanDJcover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/oriyanDJ.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                      <h3 class="ml-4 font-serif text-lg font-bold">ORIYAN DJ WITH SURA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/cubSoniccover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/cubSonic.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">CUB SONIC</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/batathDholcover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/batathDhol.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">BARATH DHOOL</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                      <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/djThenucover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/djThenu.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">DJ THENU</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <p class="font-k2d ml-[60px] text-[42px] text-slate-700">DECORATIONS</p>
    </div>
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-lg border bg-white shadow-md" data-category="decorations">>
            <img src="{{ asset('../img/lassanaFloracover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/lassanaFlora.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                      <h3 class="ml-4 font-serif text-lg font-bold">LASSANA FLORA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/akalankaFloracover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/akalankaFlora.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">AKALANKA FLORA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/isliFloracover3.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/isliFlora.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">ISALI FLORA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                      <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rounded-lg border bg-white shadow-md">
            <img src="{{ asset('../img/harshFloracover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <div class="mb-2 flex items-center">
                    <img src="{{ asset('../img/harshFlora.jpg') }}" alt="Logo" class="h-[60px] w-[60px] rounded-full border" />
                    <h3 class="ml-4 font-serif text-lg font-bold">HARSHA FLORA</h3>
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-x-2">
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="relative mb-[100px] mt-[100px] h-[450px] overflow-hidden bg-gradient-to-r from-[#1A2745] to-[#0C1936] shadow-xl" data-aos="fade-up">
        <!-- Decorative Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black via-transparent to-black opacity-50"></div>
        
        <!-- Content Area -->
        <div class="relative z-10 flex h-full items-center justify-center px-6 text-center sm:px-20">
            <div>
                <h2 class="font-serif text-[40px] leading-snug text-white sm:text-[54px]" data-aos="zoom-in">
                    <span class="font-extrabold text-[#F4C430]">Vehicles for Every Occasion</span> <br>
                    Travel in Comfort & Style with <br>
                    <span class="italic text-[#9AD3F6]">Pearl Princess</span>.
                </h2>
                <p class="mt-4 text-lg text-[#E3E8EF]" data-aos="fade-up" data-aos-delay="200">
                    Luxury vehicles tailored to your needs. Weddings, corporate events, or personal travel—we’ve got you covered.
                </p>
                <button class="mt-[30px] rounded-full bg-yellow-400 px-[20px] py-[10px] text-lg font-medium text-black shadow-md transition-all hover:bg-yellow-500 hover:shadow-lg">
                    Book Now
                </button>
            </div>
        </div>
            
        <!-- Decorative Elements -->
        <div class="absolute left-0 top-0 h-[150px] w-[150px] rounded-full bg-[#F4C430] opacity-30 blur-xl"></div>
        <div class="absolute bottom-0 right-0 h-[200px] w-[200px] rounded-full bg-[#9AD3F6] opacity-20 blur-[80px]"></div>
    
        <!-- Images -->
        <img src="{{ asset('../img/defender-removebg-preview.png') }}" alt="Luxury Car 1" class="absolute bottom-9 left-0 h-[350px] w-[400px] object-contain opacity-90 transition-transform duration-300 ease-in-out hover:scale-105">
        <img src="{{ asset('../img/bmw-removebg-preview.png') }}" alt="Luxury Car 2" class="absolute bottom-0 right-0 h-[250px] w-[300px] object-cover opacity-90 transition-transform duration-300 ease-in-out hover:scale-105">

    </div>
</body>



@endsection






{{-- @extends('layout')

@section('content')

<body class="m-0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200, 
            easing: 'ease-in-out',
            once: false,
        });

        // Dynamic filtering function
        function filterItems() {
            const selectedType = document.getElementById('eventType').value.toLowerCase();
            const cards = document.querySelectorAll('.filter-item');

            cards.forEach(card => {
                const category = card.dataset.category.toLowerCase();
                if (selectedType === 'all' || category === selectedType) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

    <div class="align-mid flex items-center justify-center pt-[100px] font-serif">
        <select id="eventType" name="eventType" class="w-1/4 rounded border px-3 py-2" onchange="filterItems()">
            <option value="all">All</option>
            <option value="venues">Venues</option>
            <option value="photo&video">Photography & Videography</option>
            <option value="recreation">Recreation</option>
            <option value="decorations">Decorations</option>
        </select>
    </div>

    <div>
        <p class="font-k2d ml-[60px] text-[42px] text-slate-700">Event Services</p>
    </div>
    
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Venues -->
        <div class="filter-item rounded-lg border bg-white shadow-md" data-category="venues">
            <img src="{{ asset('../img/barnhouse2.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <h3 class="font-serif text-lg font-bold">The Barnhouse Studio - Panadura</h3>
            </div>
        </div>

        <!-- Photo & Video -->
        <div class="filter-item rounded-lg border bg-white shadow-md" data-category="photo&video">
            <img src="{{ asset('../img/naduncover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <h3 class="font-serif text-lg font-bold">Nadun Lakina Photography</h3>
            </div>
        </div>

        <!-- Recreation -->
        <div class="filter-item rounded-lg border bg-white shadow-md" data-category="recreation">
            <img src="{{ asset('../img/oriyanDJcover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <h3 class="font-serif text-lg font-bold">Oriyan DJ With Sura</h3>
            </div>
        </div>

        <!-- Decorations -->
        <div class="filter-item rounded-lg border bg-white shadow-md" data-category="decorations">
            <img src="{{ asset('../img/lassanaFloracover.jpg') }}" alt="Event Image" class="h-48 w-full rounded-t-lg object-cover" />
            <div class="p-4">
                <h3 class="font-serif text-lg font-bold">Lassana Flora</h3>
            </div>
        </div>

        <!-- Add more cards here with appropriate data-category -->
    </div>
</body>
@endsection --}}
