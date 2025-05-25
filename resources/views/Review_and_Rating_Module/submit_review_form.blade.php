@extends('layouts.app')

@section('title', 'Submit Review')

@section('content')
    @include('header') {{-- Include header --}}

    <div class="max-w-3xl mx-auto px-6 sm:px-10 flex-grow">
        <h2 class="text-3xl font-bold text-center my-6">Submit Your Review</h2>

        {{-- Message + CTA --}}
        <p class="text-gray-600 mb-6 max-w-2xl mx-auto text-center">
            Love what you cooked or tried? Leave a review and let others know what you think.
            Your feedback helps us and our community celebrate the joy of Malaysian cuisine!
        </p>

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

            {{-- Styled Submit Button --}}
            <section class="w-full flex justify-center mt-8">
                <button type="submit"
                    class="bg-[#800000] text-white px-8 py-4 rounded-full shadow-lg text-sm sm:text-base tracking-widest 
                           hover:bg-gray-200 hover:text-black transition duration-300 ease-in-out">
                    SUBMIT YOUR REVIEW
                </button>
            </section>
        </form>
    </div>
@endsection
