<div x-data="{ sidebarOpen: true }"
    class="bg-primary text-white flex flex-col h-screen shrink-0 transition-all duration-300 ease-in-out"
    :class="sidebarOpen ? 'w-auto' : 'w-30'">

    <div class="p-6 bg-linear-to-l from-primary to-[#001642]">
        <div class="flex items-center gap-2 cursor-pointer" @click="sidebarOpen = !sidebarOpen">
            <div class="p-2 rounded-lg">
                <img src="{{ asset('build/assets/images/userPage/wordLogo.png') }}"
                    alt="Logo"
                    class="hidden sm:block"
                    x-show="sidebarOpen">

                <img src="{{ asset('build/assets/images/userPage/logo.png') }}"
                    alt="Logo"
                    class="w-10 h-8"
                    :class="sidebarOpen ? 'block sm:hidden' : 'block'">
            </div>
        </div>
    </div>

    <nav class="flex-1 p-6 space-y-8 bg-linear-to-l from-primary to-[#001642] overflow-y-auto">
        <div>
            <h3 x-show="sidebarOpen" class="transition-opacity duration-200">General</h3>
            <ul class="space-y-3" :class="!sidebarOpen ? 'mt-4' : ''">
                <li>
                    <a href="{{ route('user.dashboard') }}" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/homeIcon.png') }}" alt="Dashboard" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/infoIcon.png') }}" alt="Info" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Info</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 x-show="sidebarOpen" class="transition-opacity duration-200">Billing</h3>
            <ul class="space-y-3" :class="!sidebarOpen ? 'mt-4' : ''">
                <li>
                    <a href="{{ route('user.electricity') }}" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/electricityIcon.png') }}" alt="Electricity" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Electricity</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.water') }}" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/waterIcon.png') }}" alt="Water" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Water</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.rent') }}" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/rentIcon.png') }}" alt="Rent" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.association') }}" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/associationIcon.png') }}" alt="Association" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Associate Fees</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 x-show="sidebarOpen" class="transition-opacity duration-200">Tools</h3>
            <ul class="space-y-3" :class="!sidebarOpen ? 'mt-4' : ''">
                <li>
                    <a href="#" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/settingsIcon.png') }}" alt="Settings" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.help') }}" class="icons-container flex items-center gap-3">
                        <img src="{{ asset('build/assets/icons/helpIcon.png') }}" alt="Help" class="icons w-6 h-6">
                        <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Help & Support</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="icons-container w-full text-left flex items-center gap-3"
                            onclick="document.getElementById('signOutModal').classList.remove('hidden')">
                            <img src="{{ asset('build/assets/icons/signOutIcon.png') }}" alt="Sign Out" class="icons w-6 h-6">
                            <span class="max-sm:hidden whitespace-nowrap" x-show="sidebarOpen">Sign Out</span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</div>
<x-sign-out-modal id="signOutModal" />
