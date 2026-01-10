@php
    $user = Auth::user()
@endphp

<div class="bg-white border-b border-gray-200 p-6 flex items-center justify-between">
    <!-- Search Bar -->
    <div class="flex-1 max-w-2/3">
        <div class="relative">
            <img src="{{ asset('build/assets/icons/searchIcon.png') }}" alt="Logo" class="icons absolute left-2.5 top-2.5 w-5 h-5">
            <input type="text" placeholder="" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full text-sm" disabled         >
        </div>
    </div>

    <!-- Right Side -->
    <div class="flex items-center gap-6 ml-8">
        <!-- Date -->
        <div class="bg-[#F3F4F6] p-2 px-4 rounded-2xl flex items-center gap-2 text-neutral-gray text-sm">
                <img src="{{ asset('build/assets/icons/calendarIcon.png')}}" alt="logo" class="icons w-5 h-5">
            <span>{{ now()->timezone('Asia/Manila')->format('D, F j, Y') }}</span>
        </div>

        <!-- Notifications -->
        <!-- Temporary Svg Logo for Notifications -->
        <button class="relative text-neutral-gray hover:text-primary transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute -top-1 -right-1 bg-danger text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
        </button>

        <!-- Profile -->
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center {{ $color }} font-bold">
                {{$user->first_name[0]}}{{ $user->last_name[0] }}
            </div>
        </div>
    </div>
</div>
