@extends('layouts.app')

@section('title', 'Edit Recipe')
@section('content')
    @include('header')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Edit Recipe</h2>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block mb-2 font-medium">Title</label>
                <input type="text" id="title" name="title" value="{{ $recipe->title }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="category" class="block mb-2 font-medium">Category</label>
                <select id="category" name="category" class="w-full border rounded px-3 py-2" required>
                    @foreach (['Malay', 'Chinese', 'Indian', 'Nyonya', 'East Malaysia', 'Modern'] as $cat)
                        <option value="{{ $cat }}" {{ $recipe->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="description" class="block mb-2 font-medium">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full border rounded px-3 py-2" required>{{ $recipe->description }}</textarea>
            </div>

            <div>
                <label for="image" class="block mb-2 font-medium">Replace Image (optional)</label>
                <input type="file" id="image" name="image" class="w-full">
            </div>

            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Recipe</button>
            </div>
        </form>
    </div>
@endsection
