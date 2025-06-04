@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#e6e1da] px-4">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Log In to Rasa Local</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mb-4 flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-700">
                    <input type="checkbox" name="remember" class="mr-2"> Remember me
                </label>
            </div>

            <button type="submit"
                class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold transition">
                Log In
            </button>
        </form>

        <p class="text-sm text-center mt-6">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-teal-700 hover:underline">Sign up</a>
        </p>
    </div>
</div>
@endsection
