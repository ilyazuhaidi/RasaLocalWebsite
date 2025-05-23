@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
@include('headers.homeheader')

<div class="max-w-3xl mx-auto px-6 sm:px-10 flex-grow">
    <h2 class="title-font text-4xl font-bold mt-12 mb-6 text-center">
        What People Are Saying
    </h2>

    @if ($recipe->reviews->isEmpty())
        <p class="text-center text-gray-600 font-mono text-sm">No reviews yet. Be the first to leave one!</p>
    @else
        @foreach ($recipe->reviews as $review)
            <div class="mb-6 p-4 border border-gray-300 rounded bg-gray-50">
                <div class="flex justify-between items-center">
                    <div>
                        <strong class="font-semibold">{{ $review->user->name }}</strong>
                        <span class="text-sm text-gray-600">— {{ $review->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-yellow-500 font-bold text-lg">
                        {{ $review->rating }} ★
                    </div>
                </div>
                <p class="mt-2 text-sm text-gray-800">{{ $review->comment }}</p>

                @if (!$review->is_flagged)
                    <form method="POST" action="{{ url('/reviews/' . $review->id . '/report') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-xs text-red-600 hover:underline">Report</button>
                    </form>
                @else
                    <p class="mt-2 text-xs text-gray-500 italic">This review has been flagged for moderation.</p>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection
