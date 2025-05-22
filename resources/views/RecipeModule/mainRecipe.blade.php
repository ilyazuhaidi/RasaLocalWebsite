@extends('layouts.app')

@section('title', 'Rasa Local')

@section('content')
    @include('headers.recipeheader')


    <section class="relative max-w-[90rem] mx-auto mt-10">
        <img 
            src="{{ asset('images/nasi lemak.jpg') }}" 
            alt="Top view of Malaysian food..." 
            class="w-full object-cover" 
            width="1920" 
            style="height: 400px"
        />
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-16 py-10 max-w-lg text-center">
            <h2 class="text-4xl font-semibold text-teal-800 leading-tight font-sans">
                Delicious Malaysian Recipes
            </h2>
        </div>
    </section>

<section class="w-full flex justify-center mt-12">
    <a href="{{ url('add-recipe') }}"
       class="bg-[#800000] text-white px-8 py-4 rounded-full shadow-lg text-sm sm:text-base tracking-widest 
              hover:bg-gray-200 hover:text-black transition duration-300 ease-in-out {{ request()->is('add-recipe') ? 'font-bold' : '' }}">
        CLICK HERE TO SHARE YOUR RECIPES WITH US
    </a>
</section>



        {{-- Types of Dishes Section --}}
    <section class="relative max-w-[90rem] mx-auto mt-10">
    <class="max-w-7xl mx-auto px-6 mt-20">
        <h2 class="text-4xl font-extrabold text-[#1a5e5e] mb-16 max-w-4xl text-center mx-auto">
            TYPES OF DISHES
        </h2>

        <section class="flex justify-center gap-20 flex-wrap">
            <article class="relative w-64 h-[400px]">
                <img 
                    alt="Malay dish with rice, egg, and sambal on banana leaf in traditional plates" 
                    class="w-full h-full object-cover" 
                    height="400" 
                    src="{{ asset('images/Malaysian Food.jpg') }}" 
                    width="256" 
                />
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-4xl font-extrabold tracking-widest underline decoration-white decoration-2 underline-offset-4 text-center">
                MALAY
                </h3>

                <button class="absolute bottom-8 left-6 bg-white text-black text-xs font-mono tracking-widest px-6 py-3 flex items-center gap-2">
                    READ MORE
                    <i class="fas fa-chevron-right"></i>
                </button>
            </article>
            <article class="relative w-64 h-[400px]">
                <img 
                    alt="Chinese dumplings arranged in a circle with soy sauce in the center on a dark plate" 
                    class="w-full h-full object-cover" 
                    height="400" 
                    src="{{ asset('images/dumpling.jpg') }}" 
                    width="256" 
                />
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-4xl font-extrabold tracking-widest underline decoration-white decoration-2 underline-offset-4 text-center">
                    CHINESE
                </h3>
                <button class="absolute bottom-8 left-6 bg-white text-black text-xs font-mono tracking-widest px-6 py-3 flex items-center gap-2">
                    READ MORE
                    <i class="fas fa-chevron-right"></i>
                </button>
            </article>
            <article class="relative w-64 h-[400px]">
                <img 
                    alt="Indian flatbread with curry and soup in white bowls on a wooden table" 
                    class="w-full h-full object-cover" 
                    height="400" 
                    src="{{ asset('images/roti canai.jpg') }}" 
                    width="256" 
                />
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-4xl font-extrabold tracking-widest underline decoration-white decoration-2 underline-offset-4 text-center">
                    INDIAN
                </h3>
                <button class="absolute bottom-8 left-6 bg-white text-black text-xs font-mono tracking-widest px-6 py-3 flex items-center gap-2">
                    READ MORE
                    <i class="fas fa-chevron-right"></i>
                </button>
            </article>
        </section>       
</main>
</section>  
    
    <section class="relative max-w-[90rem] mx-auto mt-10">
    <section class="flex justify-center gap-20 flex-wrap">
            <article class="relative w-64 h-[400px]">
                <img 
                    alt="nyonya peranakan Dishes" 
                    class="w-full h-full object-cover" 
                    height="400" 
                    src="{{ asset('images/pie tee.jpg') }}" 
                    width="256" 
                />
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-4xl font-extrabold tracking-widest underline decoration-white decoration-2 underline-offset-4 text-center">
                NYONYA
                </h3>

                <button class="absolute bottom-8 left-6 bg-white text-black text-xs font-mono tracking-widest px-6 py-3 flex items-center gap-2">
                    READ MORE
                    <i class="fas fa-chevron-right"></i>
                </button>
            </article>
            <article class="relative w-64 h-[400px]">
                <img 
                    alt="SABAH SARAWAK DISHES" 
                    class="w-full h-full object-cover" 
                    height="400" 
                    src="{{ asset('images/ambuyat.jpg') }}" 
                    width="256" 
                />
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-4xl font-extrabold tracking-widest underline decoration-white decoration-2 underline-offset-4 text-center">
                    EAST MALAYSIA
                </h3>
                <button class="absolute bottom-8 left-6 bg-white text-black text-xs font-mono tracking-widest px-6 py-3 flex items-center gap-2">
                    READ MORE
                    <i class="fas fa-chevron-right"></i>
                </button>
            </article>
            <article class="relative w-64 h-[400px]">
                <img 
                    alt="modern food" 
                    class="w-full h-full object-cover" 
                    height="400" 
                    src="{{ asset('images/modern.jpg') }}" 
                    width="256" 
                />
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-4xl font-extrabold tracking-widest underline decoration-white decoration-2 underline-offset-4 text-center">
                    MODERN
                </h3>
                <button class="absolute bottom-8 left-6 bg-white text-black text-xs font-mono tracking-widest px-6 py-3 flex items-center gap-2">
                    READ MORE
                    <i class="fas fa-chevron-right"></i>
                </button>
            </article>
    </section>
    </section>
    
    <section class="relative max-w-[90rem] mx-auto mt-10">

    </section>


    <button 
        aria-label="Chat support" 
        class="fixed bottom-6 right-6 bg-red-800 hover:bg-red-900 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg"
    >
        <i class="fas fa-comment-alt text-lg"></i>
    </button>
@endsection
