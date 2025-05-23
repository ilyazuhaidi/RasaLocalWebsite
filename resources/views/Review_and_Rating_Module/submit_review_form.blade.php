@extends('layouts.app')

@section('title', 'Submit Review')

@section('content')
    @include('headers.homeheader') {{-- Include header --}}

    <div class="max-w-3xl mx-auto px-6 sm:px-10 flex-grow">
        <h2 class="text-3xl font-bold text-center my-6">Submit Your Review</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4 mt-6">
            @csrf

            <div>
                <label class="block mb-1 font-semibold">Recipe</label>
                <select name="recipe_id" required class="w-full border px-3 py-2 rounded">
                    <option value="" disabled selected>Select a recipe</option>
                    @foreach ($recipes as $recipe)
                        <option value="{{ $recipe->id }}">{{ $recipe->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Rating</label>
                <select name="rating" required class="w-full border px-3 py-2 rounded">
                    <option value="" disabled selected>Select a rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Comment</label>
                <textarea name="comment" rows="4" class="w-full border px-3 py-2 rounded" placeholder="Your thoughts..."></textarea>
            </div>

            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Submit Review</button>
        </form>
    </div>
@endsection
