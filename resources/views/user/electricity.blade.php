@extends('layouts.app')

@section('title', 'Electricity')

@section('content')
<div class="flex h-screen bg-neutral-light">

    @include('components.sidebar')

    < class="flex-1 overflow-auto">
        @include('components.topbar')

        <div class="p-8 px-18 max-md:px-8">

            <div class="mb-8">
                <div class="flex items-center text-primary mb-2">
                    <h1 class="text-4xl font-bold">Electricity</h1>
                    <svg class="w-10 h-10 mb-1 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <p class="text-neutral-gray inline-block">Manage electricity consumption</p>
            </div>

            <div class="gap-8 mb-10">
                <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                    <h2 class="text-xl font-medium text-primary mb-6">Monthly Consumption Summary</h2>
                    <div class="mb-4">
                        <x-annual-chart
                            :year="$year"
                            route="user.electricity"
                            :data="$chartData"
                            label="Electricity Consumption (kWh)"
                            unit="kWh"
                            color="#1e3a8a"
                        />
                    </div>
                </div>
            </div>

            <div class="gap-8">
                <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-text-primary">Electricity Dashboard</h2>
                        
                        <button onclick="document.getElementById('filterModal').classList.remove('hidden')"
                        class="filter-btn">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 6H21M6 12H18M10 18H14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="tracking-tight text-base">Filter</span>
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="table-headers">Transaction ID</th>
                                    <th class="table-headers">kWh</th>
                                    <th class="table-headers">Date Paid</th>
                                    <th class="table-headers">Amount</th>
                                    <th class="table-headers">Status</th>
                                    <th class="table-headers"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bills as $bill)
                                    <x-electricity-transaction :bill="$bill" />
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-4 text-gray-500">
                                                No electricity billing history found.
                                            </td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                    @include('components.bills-footer')
                </div>
            </div>

        </div>
            @include('components.page-footer')
    </div>
</div>
<x-filter-modal id="filterModal" />
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
    @vite('resources/js/filter.js')
@endpush
