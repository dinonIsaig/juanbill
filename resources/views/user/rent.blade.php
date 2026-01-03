@extends('layouts.app')

@section('title', 'Rent')

@section('content')
<div class="flex h-screen bg-neutral-light">

    @include('components.sidebar')

    <div class="flex-1 overflow-auto">
        @include('components.topbar')

        <div class="p-8 px-18 max-md:px-8">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary">Rent</h1>
                <p class="text-neutral-gray inline-block">Manage Rent Fees Transactions</p>
            </div>

            <div class="gap-8">
                <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                    <div class="grid grid-cols-2">
                        <h2 class="text-xl font-bold text-text-primary mb-6 col-span-1">Rent Fees Dashboard</h2>
                        <div class="flex justify-end mb-6 col-span-1">
                            <button onclick="document.getElementById('filterModal').classList.remove('hidden')"
                                    class="filter-btn flex items-center gap-2">
                                <img src="{{ asset('build/assets/icons/filter.png') }}" alt="Filter" class="w-4 h-4">
                                Filter
                            </button>
                        </div>
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
@endpush
