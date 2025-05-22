@extends('layouts.app')

@section('title', 'My Recipes')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold mb-6 text-center">My Submitted Recipes</h2>

        @if (session('success'))
            <div class="mb-4 p-4 border border-green-600 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($recipes->isEmpty())
            <p class="text-center text-gray-600">No recipes found.</p>
        @else
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($recipes as $recipe)
                    <div class="border border-gray-200 rounded p-4 shadow">
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover mb-4 rounded">
                        <h3 class="text-xl font-semibold">{{ $recipe->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $recipe->category }}</p>
                        <p class="text-gray-700 mt-2">{{ $recipe->description }}</p>

                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
