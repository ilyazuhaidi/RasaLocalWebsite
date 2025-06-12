@extends('layouts.app')

@section('title', $recipe->title)

@section('content')
    @include('header')

    <div class="max-w-4xl mx-auto mt-12 px-6">
        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="Recipe Image" class="w-full h-auto rounded-lg shadow">

        <h1 class="text-4xl font-bold mt-6 text-teal-800">{{ $recipe->title }}</h1>

        {{-- ✅ Show the submitter --}}
        <p class="mt-2 text-sm text-gray-600">
            Submitted by: 
            <span class="font-semibold">
                {{ $recipe->user->name ?? 'Unknown User' }}
            </span>
        </p>

        <p class="mt-1 text-sm text-gray-600">
            Category: 
            <span class="font-semibold">{{ $recipe->category }}</span>
        </p>

        <div class="mt-4 text-gray-700 text-lg leading-relaxed whitespace-pre-line">
            {!! nl2br(e($recipe->description)) !!}
        </div>

        @auth
            @php
                $isSaved = auth()->user()->savedRecipes->contains($recipe->id);
            @endphp

            @if($isSaved)
                <form action="{{ route('recipes.unsave', $recipe->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                        Unsave
                    </button>
                </form>
            @else
                <form action="{{ route('recipes.save', $recipe->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-gray-300 text-black rounded">Save Recipe</button>
                </form>
            @endif
        @else
            <a href="{{ route('login') }}" class="text-blue-600 underline">Log in to save this recipe</a>
        @endauth
    </div>
@endsection
