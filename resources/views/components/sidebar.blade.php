<div class="w-64 bg-primary text-white flex flex-col">
    <!-- Logo -->
    <div class="p-6  bg-linear-to-l from-primary to-[#001642]"">
        <div class="flex items-center gap-2">
            <div class=" p-2 rounded-lg">
                <img src="{{ asset('build/assets/images/userPage/wordLogo.png') }}" alt="Logo">
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-6 space-y-8 bg-linear-to-l from-primary to-[#001642]">
        <!-- General Section -->
        <div>
            <h3 class="text-xs font-bold text-white/60 uppercase tracking-wider mb-4">General</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9M9 5a1 1 0 011-1h4a1 1 0 011 1"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Info</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Billing Section -->
        <div>
            <h3 class="text-xs font-bold text-white/60 uppercase tracking-wider mb-4">Billing</h3>
            <ul class="space-y-3">
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span>Electricity</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span>Water</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9"/>
                        </svg>
                        <span>Rent</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197"/>
                        </svg>
                        <span>Associate Fees</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tools Section -->
        <div>
            <h3 class="text-xs font-bold text-white/60 uppercase tracking-wider mb-4">Tools</h3>
            <ul class="space-y-3">
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Help & Support</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sign Out -->
    <div class="p-6 border-b border-primary-dark bg-linear-to-l from-primary to-[#001642]">
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-primary-dark transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span>Sign Out</span>
        </a>
    </div>
</div>
