@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex h-screen bg-neutral-light">
        @include('components.sidebar')

        <div class="flex-1 overflow-auto">
            @include('components.topbar')

            <div class="p-8 mb-70 max-md:mb-0">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-primary mb-2">Billing & Payments Overview</h1>
                    <p class="text-neutral-gray">Manage your billing and track payments</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2">
                        <x-dual-chart
                            :elecData="$elecData"
                            :waterData="$waterData"
                            :year="$currentYear"
                            yearParam="year"
                        />
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-medium text-primary">Upcoming Bills</h2>

                        </div>

                        <div class="space-y-4">
                            @forelse($upcomingBills as $bill)
                                @include('components.bill-card', [
                                    'icon' => '',
                                    'title' => ucfirst($bill->type),
                                    'amount' => '₱' . number_format($bill->amount, 2),
                                    'dueDate' => 'Due ' . $bill->due_date->format('M d'),
                                    'color' => match (strtolower($bill->type)) {
                                        'electricity' => 'bg-secondary',
                                        'water' => 'bg-primary', // Adjusted based on your file
                                        'rent' => 'bg-purple-300',
                                        'association dues' => 'bg-gray-300',
                                        default => 'bg-gray-100'
                                    },
                                ])
                            @empty
                                <p class="text-gray-500 text-center py-4">No upcoming bills.</p>
                            @endforelse
                        </div>
                    </div>

                </div>

                <div class="mt-8">
                    <x-recent-transactions :bills="$recentPaidBills" />
                </div>

            </div>
            @include('components.page-footer')
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/charts.js')
@endpush
