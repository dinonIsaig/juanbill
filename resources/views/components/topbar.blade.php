<div class="bg-white border-b border-gray-200 p-6 flex items-center justify-between">
    <!-- Search Bar -->
    <div class="flex-1 max-w-sm">
        <div class="relative">
            <svg class="absolute left-3 top-3 w-5 h-5 text-neutral-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" placeholder="Search transactions, bills..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full text-sm">
        </div>
    </div>

    <!-- Right Side -->
    <div class="flex items-center gap-6 ml-8">
        <!-- Date -->
        <div class="flex items-center gap-2 text-neutral-gray text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>{{ date('D, F j, Y') }}</span>
        </div>

        <!-- Notifications -->
        <button class="relative text-neutral-gray hover:text-primary transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute -top-1 -right-1 bg-danger text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
        </button>

        <!-- Profile -->
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center text-primary font-bold">
                JC
            </div>
            <span class="text-sm font-medium text-text-primary">JC</span>
        </div>
    </div>
</div>
