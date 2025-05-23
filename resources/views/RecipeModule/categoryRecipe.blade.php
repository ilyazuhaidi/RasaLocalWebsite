@extends('layouts.app')

@section('title', $category . ' Recipes')

@section('content')
    @include('header')

    <div class="max-w-5xl mx-auto px-6 mt-12">
        <h2 class="text-4xl font-bold text-teal-800 mb-8 text-center">
            {{ strtoupper($category) }} Recipes
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($recipes as $recipe)
                <div class="bg-white shadow-md rounded overflow-hidden">
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="Recipe Image">
                    <div class="p-4">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="text-lg font-semibold text-teal-800 hover:underline">
                        {{ $recipe->title }}
                    </a>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($recipe->description, 100) }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-600">No recipes found for this category.</p>
            @endforelse
        </div>
    </div>
@endsection
