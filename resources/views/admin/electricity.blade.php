@extends('layouts.app')

@section('title', 'Electricity')

@section('content')

<div class="flex min-h-screen bg-neutral-light items-start">
        
    <aside class="sticky top-0 self-start">
        @include('components.admin-sidebar')
    </aside>

    <div class="flex-1 flex flex-col w-full min-w-0">
        @include('components.admin-topbar')

        <!-- Header -->
         <div class="p-8 px-18 max-md:px-8 ">

            <div class="mb-8">
                <div class="flex items-center mb-2">
                <h1 class="text-4xl font-bold text-[#CE1126]">Electricity</h1>
                <svg class="w-10 h-10 ml-1" fill="none" stroke="#CE1126" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <p class="text-neutral-gray">Manage electricity consumption</p>

                <div class=" grid grid-cols-1 gap-8 mb-15 mt-8">
                    <div class="bg-white rounded-lg shadow-md p-8 w-full">
                        <h2 class="text-xl font-medium text-[#CE1126] mb-6">Monthly Consumption Summary</h2>
                        <div class="h-120 max-md:h-80 w-full relative">
                            <canvas id="adminElectricChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gap-8">
                <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-text-primary">Electricity Dashboard</h2>
                        
                        <button onclick="document.getElementById('admin-filterModal').classList.remove('hidden')"
                                    class="admin-filter-btn flex items-center gap-2">
                                <img src="{{ asset('build/assets/icons/red-filter.png') }}" alt="Filter" class="w-4 h-4">
                                Filter
                            </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="table-headers">Transaction ID</th>
                                    <th class="table-headers">kWh</th>
                                    <th class="table-headers">Due Date</th>
                                    <th class="table-headers">Date Paid</th>
                                    <th class="table-headers">Amount</th>
                                    <th class="table-headers">Unit</th>
                                    <th class="table-headers">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('components.admin-electricity-transaction', ['transactionID' => 'TXN-202-4-001', 'kwh' => '1000 kwh', 'dueDate' => '2024-06-15', 'datePaid' => '2024-06-15', 'amount' => '1000', 'unit' => '3210', 'status' => 'Paid'])
                                @include('components.admin-electricity-transaction', ['transactionID' => 'TXN-202-4-001', 'kwh' => '1000 kwh', 'dueDate' => '2023-01-15', 'datePaid' => '', 'amount' => '1000', 'unit' => '3110', 'status' => 'Pending'])
                                @include('components.admin-electricity-transaction', ['transactionID' => 'TXN-202-4-001', 'kwh' => '1000 kwh', 'dueDate' => '2023-02-15', 'datePaid' => '', 'amount' => '1000', 'unit' => '2310', 'status' => 'Overdue'])
                                @include('components.admin-electricity-transaction', ['transactionID' => 'TXN-202-4-001', 'kwh' => '1000 kwh', 'dueDate' => '2025-07-15', 'datePaid' => '', 'amount' => '1000', 'unit' => '1310', 'status' => 'Overdue'])
                                @include('components.admin-electricity-transaction', ['transactionID' => 'TXN-202-4-001', 'kwh' => '1000 kwh', 'dueDate' => '2024-07-15', 'datePaid' => '', 'amount' => '1000', 'unit' => '2210', 'status' => 'Pending'])
                                @include('components.admin-electricity-transaction', ['transactionID' => 'TXN-202-4-001', 'kwh' => '1000 kwh', 'dueDate' => '2024-04-15', 'datePaid' => '2024-06-16', 'amount' => '1000', 'unit' => '3205', 'status' => 'Paid'])
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('components.admin-page-footer')
    </div>
</div>
<x-admin-filter-modal id="admin-filterModal"/>
@endsection

@push('scripts')
    @vite('resources/js/admin-electric-chart.js')
    @vite('resources/js/admin-filter.js')
@endpush