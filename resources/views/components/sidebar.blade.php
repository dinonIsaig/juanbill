<div class="w-auto bg-primary text-white flex flex-col h-screen shrink-0">
    <div class="p-6  bg-linear-to-l from-primary to-[#001642]"">
        <div class="flex items-center gap-2">
            <div class=" p-2 rounded-lg">
                <img src="{{ asset('build/assets/images/userPage/wordLogo.png') }}" alt="Logo" class="hidden sm:block">
                <img src="{{ asset('build/assets/images/userPage/logo.png') }}" alt="Logo" class="block w-10 h-8 sm:hidden">
            </div>
        </div>
    </div>

    <nav class="flex-1 p-6 space-y-8 bg-linear-to-l from-primary to-[#001642]">
        <div>
            <h3>General</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('user.dashboard') }}" class="icons-container">
                        <img src="{{ asset('build/assets/icons/homeIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icons-container">
                        <img src="{{ asset('build/assets/icons/infoIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Info</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3>Billing</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('user.electricity') }}" class="icons-container">
                        <img src="{{ asset('build/assets/icons/electricityIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Electricity</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.water') }}" class="icons-container">
                        <img src="{{ asset('build/assets/icons/waterIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Water</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.rent') }}" class="icons-container">
                        <img src="{{ asset('build/assets/icons/rentIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.association') }}" class="icons-container">
                        <img src="{{ asset('build/assets/icons/associationIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Associate Fees</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3>Tools</h3>
            <ul class="space-y-3">
                <li>
                    <a href="#" class="icons-container">
                        <img src="{{ asset('build/assets/icons/settingsIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.help') }}" class="icons-container">
                        <img src="{{ asset('build/assets/icons/helpIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Help & Support</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="icons-container w-full text-left"
                            onclick="document.getElementById('signOutModal').classList.remove('hidden')">
                            <img src="{{ asset('build/assets/icons/signOutIcon.png') }}" alt="Logo" class="icons">
                            <span class="max-sm:hidden">Sign Out</span>
                    </button>
                </li>

            </ul>
        </div>
    </nav>
</div>
<x-sign-out-modal id="signOutModal" />
