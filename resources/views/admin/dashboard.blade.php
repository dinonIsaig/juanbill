@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="flex h-screen bg-neutral-light">

    @include('components.admin-sidebar')

    <div class="flex-1 overflow-auto">
        @include('components.admin-topbar')

        <!-- Header -->
         <div class="p-8 mb-70 max-md:mb-0 3xl:mb-120">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-admin mb-2">Billing & Payments Overview</h1>
                <p class="text-neutral-gray">Manage your billing and track payments</p>
            </div>

            <!-- Card -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mb-8">

                <!-- Electricity Card -->
                <a href="{{ route('admin.electricity') }}" class="col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/yellowelectricityIcon.png') }}" alt="Electricity Icon">
                    <p class="py-4 font-semibold text-neutral-800">Electricity</p>
                </a>

                <!-- Water Card -->
                <a href="{{ route('admin.water') }}" class="col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/blueWaterIcon.png') }}" alt="Water Icon">
                    <p class="py-4 font-semibold text-neutral-800">Water</p>
                </a>

                <!-- Rent Card -->
                <a href="{{ route('admin.rent') }}" class="col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/redRentIcon.png') }}" alt="Rent Icon">
                    <p class="py-4 font-semibold text-neutral-800">Rent</p>
                </a>

                <!-- Association dues Card -->
                <a href="{{ route('admin.association') }}" class="col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/blueAssociationIcon.png') }}" alt="Association dues Icon">
                    <p class="py-4 font-semibold text-neutral-800">Association Dues</p>
                </a>

            </div>

            <x-dual-chart
                :elecData="$elecData"
                :waterData="$waterData"
                :year="$currentYear"
                route="admin.dashboard"
                id="adminDashboardChart"
                yearParam="year"
                title="Monthly Billing Summary"
            />
        </div>

        @include('components.admin-page-footer')
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
@endpush
