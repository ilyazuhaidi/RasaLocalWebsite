@extends('layouts.app')

@section('title', $recipe->title)
@section('content')
    @include('header')


@section('content')
<div class="max-w-4xl mx-auto mt-12 px-6">
    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="Recipe Image">
    <h1 class="text-4xl font-bold mt-6 text-teal-800">{{ $recipe->title }}</h1>

    <p class="mt-2 text-sm text-gray-600">Category: <span class="font-semibold">{{ $recipe->category }}</span></p>

    <div class="mt-4 text-gray-700 text-lg leading-relaxed whitespace-pre-line">
        {!! nl2br(e($recipe->description)) !!}
    </div>

</div>
@endsection
