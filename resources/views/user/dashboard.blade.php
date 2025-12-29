@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex h-screen bg-neutral-light">
    @include('components.sidebar')

    <div class="flex-1 overflow-auto">
        @include('components.topbar')

        <div class="p-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary mb-2">Billing & Payments Overview</h1>
                <p class="text-neutral-gray">Manage your billing and track payments</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-xl font-medium text-primary mb-6">Monthly Billing Breakdown</h2>

                    <div class="h-80 relative">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-medium text-primary">Upcoming Bills</h2>
                        <button class="text-neutral-gray hover:text-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="space-y-4">
                        @include('components.bill-card', ['icon' => '', 'title' => 'Electricity', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-secondary'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Water', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-info'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Associate Fees', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-success'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Rent', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-primary'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Water', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-info'])
                    </div>

                    <button class="btn-primary w-full mt-8 text-lg font-semibold">Pay All Bills</button>
                </div>
            </div>
        </div>
        <div class="footer pb-8">
            <div class="w-full flex justify-evenly text-[14px]">
                <img class="w-32 h-auto inline" src="{{ asset('build/assets/images/userPage/wordLogo.png') }}" alt="Logo">
                <span>About Us</span>
                <span>FAQs</span>
                <span>Privacy Statement</span>
                <span>Terms and condition</span>
                <span>Help & Support</span>
            </div>
            <div class="w-full justify-center items-center text-center mt-5">
                <hr class="items-center w-9/10 mx-auto border-neutral-gray">
                <p class="text-center text-[12px] text-neutral-gray mt-4 mb-4">© 2025 JuanBill. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
@endpush
