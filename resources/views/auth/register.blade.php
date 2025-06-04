@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#e6e1da] px-4">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm text-gray-700">Username</label>
                <input type="text" name="username" id="username" required value="{{ old('username') }}"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
            </div>

            <button type="submit"
                class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold transition">
                Sign Up
            </button>
        </form>

        <p class="text-sm text-center mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-teal-700 hover:underline">Log in</a>
        </p>
    </div>
</div>
@endsection
