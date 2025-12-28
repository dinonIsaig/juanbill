@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex h-screen bg-neutral-light">
    <!-- Sidebar Navigation -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Top Bar -->
        @include('components.topbar')

        <!-- Page Content -->
        <div class="p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary mb-2">Billing & Payments Overview</h1>
                <p class="text-neutral-gray">Manage your billing and track payments</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Monthly Billing Breakdown -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-xl font-medium text-primary mb-6">Monthly Billing Breakdown</h2>

                    <!-- Chart -->
                    <div class="h-80 relative">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

                <!-- Upcoming Bills -->
                <div class="bg-white rounded-lg shadow-md p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-medium text-primary">Upcoming Bills</h2>
                        <button class="text-neutral-gray hover:text-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Bills List -->
                    <div class="space-y-4">
                        @include('components.bill-card', ['icon' => '', 'title' => 'Electricity', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-secondary'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Water', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-info'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Associate Fees', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-success'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Rent', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-primary'])
                        @include('components.bill-card', ['icon' => '', 'title' => 'Water', 'amount' => '₱1,720', 'dueDate' => 'Due Jul 10', 'color' => 'bg-info'])
                    </div>

                    <!-- Pay Bills Button -->
                    <button class="btn-primary w-full mt-8 text-lg font-semibold">Pay All Bills</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
@endpush

