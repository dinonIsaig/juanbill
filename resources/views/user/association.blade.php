@extends('layouts.app')

@section('title', 'Association Fees')

@section('content')
<div class="flex h-screen bg-neutral-light">

    @include('components.sidebar')

    <div class="flex-1 overflow-auto">
        @include('components.topbar')

        <div class="p-8 px-18 max-md:px-8">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary">Association Fees</h1>
                <p class="text-neutral-gray inline-block">Manage Association Fees Transactions</p>
            </div>

            <div class="gap-8">
                <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-text-primary">Association Dashboard</h2>
                        
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
                                    <th class="table-headers">Due Date</th>
                                    <th class="table-headers">Date Paid</th>
                                    <th class="table-headers">Amount</th>
                                    <th class="table-headers">Status</th>
                                    <th class="table-headers"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('components.association-transaction', ['transactionID' => 'TXN-202-4-001', 'dueDate' => '2024-06-15', 'datePaid' => '2024-06-15', 'amount' => '1000', 'status' => 'Paid'])
                                @include('components.association-transaction', ['transactionID' => 'TXN-202-4-001', 'dueDate' => '2024-06-15', 'datePaid' => '', 'amount' => '1000', 'status' => 'Pending'])
                                @include('components.association-transaction', ['transactionID' => 'TXN-202-4-001', 'dueDate' => '2024-06-15', 'datePaid' => '', 'amount' => '1000', 'status' => 'Overdue'])
                                @include('components.association-transaction', ['transactionID' => 'TXN-202-4-001', 'dueDate' => '2024-06-15', 'datePaid' => '', 'amount' => '1000', 'status' => 'Overdue'])
                                @include('components.association-transaction', ['transactionID' => 'TXN-202-4-001', 'dueDate' => '2024-06-15', 'datePaid' => '', 'amount' => '1000', 'status' => 'Pending'])
                                @include('components.association-transaction', ['transactionID' => 'TXN-202-4-001', 'dueDate' => '2024-06-15', 'datePaid' => '2024-06-16', 'amount' => '1000', 'status' => 'Paid'])
                            </tbody>
                        </table>
                    </div>
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
