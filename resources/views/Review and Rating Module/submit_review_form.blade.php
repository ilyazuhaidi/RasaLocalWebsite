@extends('layouts.app')

@section('title', 'Submit Review')

@section('content')
@include('headers.homeheader')

<div class="max-w-3xl mx-auto px-6 sm:px-10 flex-grow">
    <h2 class="title-font text-4xl font-bold mt-12 mb-6 text-center">
        Submit Your Review
    </h2>

    @if (session('success'))
        <div class="mt-6 p-4 border border-green-600 bg-green-100 text-green-800 font-mono text-sm rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-6 p-4 border border-red-600 bg-red-100 text-red-800 font-mono text-sm rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/recipes/' . $recipe->id . '/reviews') }}" method="POST" class="space-y-8">
        @csrf

        <div>
            <label for="rating" class="block mb-2 font-mono text-sm font-semibold">Your Rating</label>
            <select id="rating" name="rating" required class="w-full border border-gray-300 rounded px-4 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-teal-600">
                <option value="" disabled selected>Select a rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="comment" class="block mb-2 font-mono text-sm font-semibold">Your Comment</label>
            <textarea id="comment" name="comment" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-teal-600" placeholder="Share your thoughts..." required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="inline-flex items-center space-x-2 border border-black bg-white text-black text-xs font-mono tracking-widest px-6 py-2 hover:bg-gray-100">
                <span>SUBMIT REVIEW</span>
                <i class="fas fa-chevron-right text-xs"></i>
            </button>
        </div>
    </form>
</div>
@endsection
