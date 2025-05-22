@extends('layouts.app')

@section('title', 'Rasa Local')

@section('content')
    @include('headers.recipeheader')


<div class="max-w-3xl mx-auto px-6 sm:px-10 flex-grow">
    <h2 class="title-font text-4xl font-bold mt-12 mb-6 text-center">
        Submit a New Recipe
    </h2>

    @if (session('success'))
        <div class="mt-6 p-4 border border-green-600 bg-green-100 text-green-800 font-mono text-sm rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div>
            <label for="title" class="block mb-2 font-mono text-sm font-semibold">Recipe Title</label>
            <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-4 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-teal-600" placeholder="Enter recipe title" required>
        </div>

        <div>
            <label for="category" class="block mb-2 font-mono text-sm font-semibold">Category</label>
            <select id="category" name="category" class="w-full border border-gray-300 rounded px-4 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-teal-600" required>
                <option value="" disabled selected>Select category</option>
                <option value="Nyonya">Nyonya</option>
                <option value="East Malaysia">East Malaysia</option>
                <option value="Modern">Modern</option>
            </select>
        </div>

        <div>
            <label for="description" class="block mb-2 font-mono text-sm font-semibold">Description</label>
            <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-teal-600" placeholder="Write a short description" required></textarea>
        </div>

        <div>
            <label for="image" class="block mb-2 font-mono text-sm font-semibold">Upload Image</label>
            <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded px-4 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-teal-600" accept="image/*" required>
        </div>

        <div class="text-center">
            <button type="submit" class="inline-flex items-center space-x-2 border border-black bg-white text-black text-xs font-mono tracking-widest px-6 py-2 hover:bg-gray-100">
                <span>SUBMIT RECIPE</span>
                <i class="fas fa-chevron-right text-xs"></i>
            </button>
        </div>
    </form>
</div>
@endsection
