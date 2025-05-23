<header class="bg-white max-w-[90rem] mx-auto flex justify-between items-center px-10 py-6">
    <div>
        <h1 class="text-2xl font-serif text-black leading-tight">
            Rasa Local
        </h1>
        <p class="text-xs tracking-widest text-black/70 mt-1 font-sans">
            Share Recipes, Savor Tradition
        </p>
    </div>
    <nav class="flex items-center space-x-8 text-black text-sm font-sans">
        <a href="{{ url('/') }}" 
           class="{{ request()->is('/') ? 'text-teal-700' : 'hover:text-teal-700' }}">
            Home
        </a>
        <a href="#" class="hover:text-teal-700">About</a>
        <a href="{{ url('main-recipe') }}" 
            class="{{ request()->is('main-recipe') ? 'text-teal-700' : 'hover:text-teal-700' }}">
            Recipes
        </a>
        <a href="#" class="hover:text-teal-700">Saved Recipes</a>
        <a href="#" class="hover:text-teal-700">Contact</a>
        <a href="#" class="hover:text-teal-700">Members</a>

<div class="relative group inline-block">
    <!-- Trigger Button -->
    <button class="flex items-center space-x-2 focus:outline-none">
        <i class="fas fa-bell text-black"></i>

        <!-- Profile Picture -->
        <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-gray-300">
            <img 
                src="{{ asset('images/default-photo.jpg') }}" 
                alt="User Photo" 
                class="w-full h-full object-cover">
        </div>

        <!-- Dropdown Arrow -->
        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity z-50">
        <ul class="text-sm text-gray-800">
            <li class="border-b border-gray-200 px-4 py-3 hover:bg-gray-50 cursor-pointer">Profile</li>
            <a href="{{ route('recipes.my') }}">
                <li class="border-b border-gray-200 px-4 py-3 hover:bg-gray-50 cursor-pointer">My Recipes</li>
            </a>
            <li class="border-b border-gray-200 px-4 py-3 hover:bg-gray-50 cursor-pointer">My Drafts</li>
            <li class="border-b border-gray-200 px-4 py-3 hover:bg-gray-50 cursor-pointer">My Groups</li>
            <li class="px-4 py-3 hover:bg-gray-50 cursor-pointer">Log Out</li>
        </ul>
    </div>
</div>


    </nav>
</header>
