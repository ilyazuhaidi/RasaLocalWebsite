@extends('layouts.app')

@section('title', 'My Saved Recipes')

@section('content')
@include('header')
<div class="max-w-4xl mx-auto mt-12 px-6">
    <h1 class="text-3xl font-bold mb-6">My Saved Recipes</h1>

    @if($savedRecipes->count() > 0)
        <ul>
            @foreach($savedRecipes as $recipe)
                <li class="mb-4 border-b pb-4">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="text-xl font-semibold text-teal-700 hover:underline">
                        {{ $recipe->title }}
                    </a>
                    <p class="text-gray-600">{{ $recipe->category }}</p>
                </li>
            @endforeach
        </ul>

        <div class="mt-6">
            {{ $savedRecipes->links() }}
        </div>
    @else
        <p>You have no saved recipes yet.</p>
    @endif
</div>
@endsection
