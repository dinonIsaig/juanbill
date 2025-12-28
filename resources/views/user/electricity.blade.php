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
                <div class="flex items-center text-primary mb-2">
                    <h1 class="text-4xl font-bold">Electricity</h1>
                    <svg class="w-10 h-10 mb-1 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <p class="text-neutral-gray inline-block">Manage electricity consumption</p>
            </div>

            <div class="gap-8">
                <!-- Monthly Billing Breakdown -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-xl font-medium text-primary mb-6">Monthly Consumption Summary</h2>
                    <!-- Chart -->
                    <div class="h-80 relative">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
@endpush

