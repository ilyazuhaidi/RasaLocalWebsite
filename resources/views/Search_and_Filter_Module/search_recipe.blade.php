@extends('layouts.app')

@section('title', 'Search Recipes')

@section('content')
    @include('header') {{-- This line includes the header --}}

    {{-- Background Image Section --}}
    <section class="relative max-w-[90rem] mx-auto mt-10">
        <img 
            src="{{ asset('images/foods.jpg') }}" 
            alt="Top view of Malaysian food..." 
            class="w-full object-cover" 
            width="1920" 
            style="height: 400px"
        />
    </section>

    <div class="max-w-4xl mx-auto px-6 sm:px-10 mt-8">
        <h2 class="text-3xl font-bold mb-4">Search Recipes</h2>

        <form method="GET" action="{{ route('recipes.search') }}" class="mb-6">
            <input
                type="text"
                name="q"
                value="{{ old('q', $query) }}"
                placeholder="Search by title, category, or description"
                class="w-full border p-2 rounded shadow"
            />
        </form>

        @if($recipes->isEmpty())
            <p class="text-gray-500">No recipes found.</p>
        @else
            <ul>
                @foreach ($recipes as $recipe)
                    <li class="mb-4 p-4 border border-gray-300 rounded bg-gray-50">
                        <h3 class="text-xl font-semibold">{{ $recipe->title }}</h3>
                        <p class="text-gray-700">{{ $recipe->description }}</p>
                        <p class="text-sm text-gray-500">Category: {{ $recipe->category }}</p>
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="text-teal-600 hover:underline">View Recipe</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
