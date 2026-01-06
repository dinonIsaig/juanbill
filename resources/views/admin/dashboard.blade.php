@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="flex min-h-screen bg-neutral-light">

    <aside class="sticky top-0 h-screen">
        @include('components.admin-sidebar')
    </aside>

    <div class="flex-1 flex flex-col">
        @include('components.admin-topbar')

        <!-- Header -->
         <div class="p-8 flex-1 ">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-admin mb-2">Billing & Payments Overview</h1>
                <p class="text-neutral-gray">Manage your billing and track payments</p>
            </div>

            <!-- Card -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl">

                <!-- Electricity Card -->
                <a href="{{ route('admin.electricity') }}" class="group col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/yellowelectricityIcon.png') }}" alt="Electricity Icon">
                    <p class="py-4 font-semibold text-neutral-800 group-hover:text-admin">Electricity</p>
                </a>

                <!-- Water Card -->
                <a href="{{ route('admin.water') }}" class="group col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/blueWaterIcon.png') }}" alt="Water Icon">
                    <p class="py-4 font-semibold text-neutral-800 group-hover:text-admin">Water</p>
                </a>

                <!-- Rent Card -->
                <a href="{{ route('admin.rent') }}" class="group col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/redRentIcon.png') }}" alt="Rent Icon">
                    <p class="py-4 font-semibold text-neutral-800 group-hover:text-admin">Rent</p>
                </a>

                <!-- Association dues Card -->
                <a href="" class="group col-span-1 bg-white rounded-xl p-6 shadow-xl transition-all duration-200 hover:scale-105 hover:shadow-2xl active:scale-95 text-left">
                    <img src="{{ asset('build/assets/icons/blueAssociationIcon.png') }}" alt="Association dues Icon">
                    <p class="py-4 font-semibold text-neutral-800 group-hover:text-admin">Association Dues</p>
                </a>

            </div>
    </div>
            <div class="grid grid-cols-1 gap-8">
                <div class="col-span-1 bg-white rounded-lg shadow-md p-8 mx-8">
                    <h2 class="text-xl font-medium text-admin mb-6">Billing Summary</h2>

                    <div class="h-80 relative">
                        <canvas id="billSumChart"></canvas>
                    </div>
            </div>

            <div>
                @include('components.admin-page-footer')
            </div>
</div>
<x-admin-sign-out-modal id="adminSignOutModal" />
@endsection

@push('scripts')
    @vite('resources/js/bill-sum-chart.js')
@endpush
