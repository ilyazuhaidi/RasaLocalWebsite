@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
@include('header')
<div class="min-h-screen bg-[#e6e1da] py-12 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-8">
        <h2 class="text-3xl font-semibold text-teal-700 mb-6">My Profile</h2>

        <div class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" value="{{ $user->username }}" readonly
                    class="mt-1 w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" value="{{ $user->name }}" readonly
                    class="mt-1 w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" value="{{ $user->email }}" readonly
                    class="mt-1 w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md">
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('profile.edit') }}"
                   class="inline-block px-5 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800">
                    Update Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
