@extends('layouts.app')

@section('title', 'All Reviews')

@section('content')
    @include('headers.homeheader') {{-- Include header --}}

    <div class="max-w-3xl mx-auto px-6 sm:px-10 flex-grow">
        <h2 class="text-3xl font-bold text-center my-6">All Reviews</h2>

        @if ($reviews->isEmpty())
            <p class="text-center text-gray-600">No reviews yet.</p>
        @else
            @foreach ($reviews as $review)
                <div class="p-4 border border-gray-300 rounded mb-4 bg-gray-50">
                    <div class="flex justify-between">
                        <div>
                            <strong>{{ $review->user->name }}</strong>
                            <span class="text-sm text-gray-500 ml-2">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-yellow-500 font-bold">{{ $review->rating }} ★</div>
                    </div>
                    <p class="mt-2 text-gray-800">{{ $review->comment }}</p>
                    <p class="text-sm text-gray-500 mt-1">Recipe: {{ $review->recipe->title }}</p>

                    @if (!$review->is_flagged)
                        <form method="POST" action="{{ route('reviews.report', $review->id) }}" class="mt-2">
                            @csrf
                            <button type="submit" class="text-xs text-red-500 hover:underline">Report</button>
                        </form>
                    @else
                        <p class="text-xs text-gray-400 italic mt-2">This review has been flagged.</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
