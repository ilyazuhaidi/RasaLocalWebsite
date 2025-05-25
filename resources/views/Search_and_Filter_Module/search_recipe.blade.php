@extends('layouts.app')

@section('title', 'Search Recipes')

@section('content')
    @include('header')

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

    <section class="max-w-7xl mx-auto px-6 mt-20">
        <h2 class="text-4xl font-extrabold text-[#1a5e5e] mb-8 text-center">SEARCH RECIPES</h2>

        @if(isset($query) && $query !== '')
            <p class="mb-4 text-gray-600 text-center text-lg">
                {{ $recipes->count() }} result{{ $recipes->count() === 1 ? '' : 's' }} found for 
                "<strong>{{ $query }}</strong>"
            </p>
        @endif

        <form method="GET" action="{{ route('recipes.search') }}" class="mb-10 max-w-2xl mx-auto">
            <input
                type="text"
                name="q"
                value="{{ old('q', $query) }}"
                placeholder="Search by title, category, or description"
                class="w-full border border-gray-300 p-3 rounded-lg shadow"
            />
        </form>

        @if($recipes->isEmpty())
            <p class="text-center text-gray-500 text-lg">No recipes found.</p>
        @else
            <ul class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($recipes as $recipe)
                    <li class="border border-gray-200 rounded-lg shadow bg-white">
                        <img 
                            src="{{ asset($recipe->image_path) }}" 
                            alt="{{ $recipe->title }}" 
                            class="w-full h-48 object-cover rounded-t-lg"
                        />
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-teal-800">{{ $recipe->title }}</h3>
                            <p class="text-gray-700 text-sm mt-2 mb-2">{{ \Illuminate\Support\Str::limit($recipe->description, 100) }}</p>
                            <p class="text-xs text-gray-500 mb-2">Category: {{ $recipe->category }}</p>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="inline-block mt-2 text-sm text-white bg-teal-700 hover:bg-teal-800 px-4 py-2 rounded transition">
                                View Recipe
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

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
