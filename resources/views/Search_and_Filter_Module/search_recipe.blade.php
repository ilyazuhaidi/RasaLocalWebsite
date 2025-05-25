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
                    <li class="mb-4 p-4 border border-gray-300 rounded bg-gray-50 flex space-x-4 items-start">
                        <img 
                            src="{{ asset($recipe->image_path) }}" 
                            alt="{{ $recipe->title }}" 
                            class="w-32 h-24 object-cover rounded"
                        />
                        <div>
                            <h3 class="text-xl font-semibold">{{ $recipe->title }}</h3>
                            <p class="text-gray-700">{{ $recipe->description }}</p>
                            <p class="text-sm text-gray-500">Category: {{ $recipe->category }}</p>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-teal-600 hover:underline">View Recipe</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Back to Top Button -->
    <button
        id="backToTopBtn"
        class="fixed bottom-8 right-8 bg-teal-600 text-white px-4 py-2 rounded shadow hover:bg-teal-700 transition-opacity opacity-70 hover:opacity-100"
        style="display:none;"
        aria-label="Back to top"
    >
        ↑
    </button>

    <script>
        // Show button when scrolling down 100px from top
        window.onscroll = function() {
            const btn = document.getElementById('backToTopBtn');
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                btn.style.display = 'block';
            } else {
                btn.style.display = 'none';
            }
        };

        // Scroll to top when clicked
        document.getElementById('backToTopBtn').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

@endsection
