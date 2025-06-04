@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
@include('header')
<div class="min-h-screen bg-[#e6e1da] py-12 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-8">
        <h2 class="text-3xl font-semibold text-teal-700 mb-6">Edit Profile</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
                </div>

                {{-- Current Password --}}
                <div class="mt-6 relative">
                    <label class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" id="current_password" name="current_password"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600"
                        required>
                    <span class="absolute right-3 top-10 cursor-pointer text-gray-500" onclick="togglePassword('current_password')">
                        👁️
                    </span>
                    <small class="text-red-500">@error('current_password') {{ $message }} @enderror</small>
                </div>

                {{-- New Password --}}
                <div class="mt-4 relative">
                    <label class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new_password" name="password"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
                    <span class="absolute right-3 top-10 cursor-pointer text-gray-500" onclick="togglePassword('new_password')">
                        👁️
                    </span>
                    <small class="text-red-500">@error('password') {{ $message }} @enderror</small>
                </div>

                {{-- Confirm Password --}}
                <div class="mt-4 relative">
                    <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="password_confirmation"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600">
                    <span class="absolute right-3 top-10 cursor-pointer text-gray-500" onclick="togglePassword('confirm_password')">
                        👁️
                    </span>
                </div>



                <div class="flex justify-between mt-6">
                    <button type="submit"
                        class="px-5 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800">
                        Save Changes
                    </button>

                    <a href="{{ route('profile') }}"
                        class="px-5 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const input = document.getElementById(fieldId);
        input.type = input.type === "password" ? "text" : "password";
    }
</script>
@endsection
