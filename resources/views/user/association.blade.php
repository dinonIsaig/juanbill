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
                    <h2 class="text-xl font-bold text-text-primary mb-6">Association Dashboard</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="table-headers">Transaction ID</th>
                                    <th class="table-headers">Cu. Meter</th>
                                    <th class="table-headers">Date Paid</th>
                                    <th class="table-headers">Amount</th>
                                    <th class="table-headers">Status</th>
                                    <th class="table-headers"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('components.water-transaction', ['transactionID' => 'TXN-202-4-001', 'water' => '1000', 'datePaid' => '2024-06-15', 'amount' => '1000', 'status' => 'Paid'])
                                @include('components.water-transaction', ['transactionID' => 'TXN-202-4-001', 'water' => '1000', 'datePaid' => '', 'amount' => '1000', 'status' => 'Pending'])
                                @include('components.water-transaction', ['transactionID' => 'TXN-202-4-001', 'water' => '1000', 'datePaid' => '', 'amount' => '1000', 'status' => 'Overdue'])
                                @include('components.water-transaction', ['transactionID' => 'TXN-202-4-001', 'water' => '1000', 'datePaid' => '', 'amount' => '1000', 'status' => 'Overdue'])
                                @include('components.water-transaction', ['transactionID' => 'TXN-202-4-001', 'water' => '1000', 'datePaid' => '', 'amount' => '1000', 'status' => 'Pending'])
                                @include('components.water-transaction', ['transactionID' => 'TXN-202-4-001', 'water' => '1000', 'datePaid' => '2024-06-16', 'amount' => '1000', 'status' => 'Paid'])
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        @include('components.page-footer')

    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
@endpush
