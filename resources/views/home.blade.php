@extends('layouts.app')

@section('title', 'Rasa Local')

@section('content')
 @include('header')


<main class="relative">
    <img src="{{ asset('images/malaysianfood.jpg') }}" alt="Top view of Malaysian local food" class="w-full h-auto object-cover" width="1920" height="600"/>
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-black/70 to-black/10 flex flex-col justify-start px-6 sm:px-12 md:px-20 lg:px-32 xl:px-40 2xl:px-56 pt-12 sm:pt-16 md:pt-20">
        <h2 class="text-white font-playfair font-extrabold text-5xl sm:text-6xl md:text-7xl leading-tight max-w-md">
            Welcome to <br/> Rasa Local
        </h2>
        <p class="text-white text-2xl max-w-xl mt-4 leading-relaxed">
            Discover the authentic flavors of Malaysia with our collection of traditional recipes and modern twists. Join us on a culinary journey through the vibrant and diverse world of Malaysian cuisine.
        </p>
        <a href="{{ url('main-recipe') }}" class="mt-6 text-white border border-white px-5 py-2 rounded-sm font-semibold text-xs sm:text-sm hover:bg-[#2B7B8C] hover:text-white transition {{ request()->is('main-recipe') }}">
            EXPLORE RECIPES
        </a>
    </div>
</main>
@endsection
