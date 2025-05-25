@extends('layouts.app')

@section('title', 'Rasa Local')

@section('content')
    @include('header')

    {{-- Hero Section --}}
    <main class="relative">
        <img src="{{ asset('images/malaysianfood.jpg') }}" alt="Top view of Malaysian local food" class="w-full h-auto object-cover" width="1920" height="600"/>
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-black/70 to-black/10 flex flex-col justify-start px-6 sm:px-12 md:px-20 lg:px-32 xl:px-40 2xl:px-56 pt-12 sm:pt-16 md:pt-20">
            <h2 class="text-white font-playfair font-extrabold text-5xl sm:text-6xl md:text-7xl leading-tight max-w-md">
                Welcome to <br/> Rasa Local
            </h2>
            <p class="text-white text-2xl max-w-xl mt-4 leading-relaxed">
                Discover the authentic flavors of Malaysia with our collection of traditional recipes and modern twists. Join us on a culinary journey through the vibrant and diverse world of Malaysian cuisine.
            </p>
            <a href="{{ url('main-recipe') }}" class="mt-6 text-white border border-white px-5 py-2 rounded-sm font-semibold text-xs sm:text-sm hover:bg-[#2B7B8C] hover:text-white transition">
                EXPLORE RECIPES
            </a>
        </div>
    </main>

    {{-- Reviews Section --}}
    <section class="bg-gray-50 py-12 px-6 sm:px-10 md:px-20 lg:px-32 xl:px-40">
        <h3 class="text-3xl font-bold text-center text-gray-800 mb-6">What Our Users Are Saying</h3>

        @if($reviews->isEmpty())
            <p class="text-center text-gray-500">No reviews submitted yet. Be the first to share your experience!</p>
        @else
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($reviews as $review)
                    <div class="bg-white shadow rounded p-5 border border-gray-100">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-semibold text-gray-800">{{ $review->user->name }}</span>
                            <span class="text-yellow-500 font-bold">{{ $review->rating }} ★</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2">{{ $review->comment }}</p>
                        <p class="text-xs text-gray-400 italic">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Styled Leave a Review Button --}}
        <section class="w-full flex justify-center mt-6">
            <a href="{{ route('reviews.create') }}"
               class="bg-[#800000] text-white px-8 py-4 rounded-full shadow-lg text-sm sm:text-base tracking-widest 
                      hover:bg-gray-200 hover:text-black transition duration-300 ease-in-out {{ request()->routeIs('reviews.create') ? 'font-bold' : '' }}">
                LEAVE A REVIEW
            </a>
        </section>
    </section>
@endsection
