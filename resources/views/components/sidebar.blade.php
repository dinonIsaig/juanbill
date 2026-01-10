<div id="sidebar" style="visibility: hidden;"
    class="user-sidebar bg-gradient-to-b from-primary to-primary-dark text-white flex flex-col h-screen shrink-0 transition-all duration-300 ease-in-out w-auto shadow-xl overflow-hidden">

    <div id="sidebar-logo" class="py-6 px-6 flex items-center">
        <div id="sidebarToggle" class="cursor-pointer transition-transform duration-200 hover:scale-105 p-2 rounded-lg">

            <img id="logoFull"
                    src="{{ asset('build/assets/images/userPage/wordLogo.png') }}"
                    alt="JuanBill Logo"
                    class="Icons object-contain block">

            <img id="logoIcon"
                    src="{{ asset('build/assets/images/userPage/logo.png') }}"
                    alt="JuanBill Icon"
                    class="w-auto h-10 Icons hidden">
        </div>
    </div>

    <nav id="mainNav" class="flex-1 px-6 py-6 space-y-8 overflow-y-auto custom-scrollbar transition-all duration-200">

        <div>
            <h3 class="sidebar-header h3-admin transition-all duration-200 whitespace-nowrap">General</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('user.dashboard') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/homeIcon.png') }}" alt="Dashboard" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Dashboard</span>
                    </a>
                </li>
                    <a href="{{ route('user.info') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/infoIcon.png') }}" alt="Info" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Info</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="sidebar-header h3-admin transition-all duration-200 whitespace-nowrap">Billing</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('user.electricity') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/electricityIcon.png') }}" alt="Electricity" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Electricity</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.water') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/waterIcon.png') }}" alt="Water" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Water</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.rent') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/rentIcon.png') }}" alt="Rent" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.association') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/associationIcon.png') }}" alt="Association" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Association Fees</span>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="sidebar-header h3-admin transition-all duration-200 whitespace-nowrap">Tools</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('user.settings') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/settingsIcon.png') }}" alt="Settings" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.help') }}" class="sidebar-link group transition-all duration-200">
                        <img src="{{ asset('build/assets/icons/helpIcon.png') }}" alt="Help" class="icons shrink-0">
                        <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Help & Support</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="sidebar-link w-full text-left flex items-center gap-3 transition-all duration-200"
                            onclick="document.getElementById('signOutModal').classList.remove('hidden')">
                            <img src="{{ asset('build/assets/icons/signOutIcon.png') }}" alt="Sign Out" class="icons shrink-0">
                            <span class="sidebar-text max-sm:hidden whitespace-nowrap transition-opacity duration-200">Sign Out</span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</div>

<x-sign-out-modal id="signOutModal" />

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const nav = document.getElementById('mainNav');
        const sidebarLogo = document.getElementById('sidebar-logo');
        const logoFull = document.getElementById('logoFull');
        const logoIcon = document.getElementById('logoIcon');

        const textSpans = document.querySelectorAll('.sidebar-text');
        const headers = document.querySelectorAll('.sidebar-header');
        const links = document.querySelectorAll('.sidebar-link');

        function setSidebarState(isCollapsed) {
            if (isCollapsed) {

                sidebar.classList.replace('w-auto', 'w-20');
                sidebarLogo.classList.replace('px-6', 'px-2');
                nav.classList.replace('px-6', 'px-2');

                logoFull.classList.add('hidden');
                logoIcon.classList.remove('hidden');

                textSpans.forEach(el => el.classList.add('hidden'));

                headers.forEach(el => {
                    el.classList.add('text-center', 'text-[10px]', 'font-bold', 'text-neutral-400', 'uppercase', 'tracking-wider', 'mb-2');
                    el.classList.remove('h3-admin');
                });

                links.forEach(el => {
                    el.classList.add('justify-center', 'px-0');
                    el.classList.remove('px-4');
                });

            } else {

                sidebar.classList.replace('w-20', 'w-auto');
                sidebarLogo.classList.replace('px-2', 'px-6');
                nav.classList.replace('px-2', 'px-6');

                logoFull.classList.remove('hidden');
                logoIcon.classList.add('hidden');

                headers.forEach(el => {
                    el.classList.remove('text-center', 'text-[10px]', 'font-bold', 'text-neutral-400', 'uppercase', 'tracking-wider', 'mb-2');
                    el.classList.add('h3-admin');
                });

                links.forEach(el => {
                    el.classList.remove('justify-center', 'px-0');
                    el.classList.add('px-4');
                });

                if (textSpans[0].classList.contains('hidden')) {
                    setTimeout(() => {
                        textSpans.forEach(el => el.classList.remove('hidden'));
                    }, 150);
                } else {
                    textSpans.forEach(el => el.classList.remove('hidden'));
                }
            }


            sidebar.style.visibility = 'visible';
        }


        const savedState = localStorage.getItem('sidebarState');
        const isCollapsed = savedState === 'collapsed';
        setSidebarState(isCollapsed);

        toggleBtn.addEventListener('click', function() {
            const isCurrentlyCollapsed = sidebar.classList.contains('w-20');
            const newState = !isCurrentlyCollapsed;
            setSidebarState(newState);
            localStorage.setItem('sidebarState', newState ? 'collapsed' : 'expanded');
        });
    });
</script>
