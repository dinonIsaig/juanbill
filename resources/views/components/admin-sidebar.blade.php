<!-- Logo -->
<div class="w-auto bg-gradient-to-b from-[#CE1126] to-[#281011] text-white flex flex-col h-full shrink-0 shadow-md">
    <div class="p-6 ">
        <div class="flex items-center gap-2">
            <div class="p-2 rounded-lg">
                <img src="{{ asset('build/assets/images/adminPage/wordLogowhite.png') }}" alt="Logo" class="hidden sm:block">
                <img src="{{ asset('build/assets/images/adminPage/logo.png') }}" alt="Logo" class="block w-10 h-8 sm:hidden">
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-6 space-y-8">
        <div>
            <h3 class="h3-admin">General</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/homeIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/infoIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Info</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="h3-admin">Billing</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('admin.electricity') }}" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/electricityIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Electricity</span>
                    </a>
                </li>
                <li>
                    <a href="" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/waterIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Water</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rent') }}" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/rentIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.association') }}" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/associationIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Association Fees</span>
                    </a>
                </li>
            </ul>
        </div>
            
        <div>
            <h3 class="h3-admin">Tools</h3>
            <ul class="space-y-3">
                <li>
                    <a href="" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/settingsIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/helpIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Help & Support</span>
                    </a>
                </li>
                <li>
                    <a href="" class="iconsRed-container">
                        <img src="{{ asset('build/assets/icons/signOutIcon.png') }}" alt="Logo" class="icons">
                        <span class="max-sm:hidden">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>