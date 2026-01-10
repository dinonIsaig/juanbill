@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex h-screen bg-neutral-light">
        @include('components.sidebar')

        <div class="flex-1 overflow-auto">
            @include('components.topbar', ['color' => 'text-primary'], ['id' => 'user.topbar'])

            <div class="p-8 mb-70 max-md:mb-0 3xl:mb-120">
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
                            id="dashboardChart"
                            route="user.dashboard"
                            yearParam="year"
                            title="Monthly Billing Summary"
                            color="text-primary"
                        />
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-medium text-primary">Upcoming Bills</h2>

                        </div>

                        <div class="space-y-4 overflow-y-scroll max-h-87 pr-2">
                            @forelse($upcomingBills as $bill)
                                @include('components.bill-card', [
                                    'icon' => match($bill->type) {
                                        'Electricity'      => 'build/assets/icons/electricityIcon.png',
                                        'Water'            => 'build/assets/icons/waterIcon.png',
                                        'Rent'             => 'build/assets/icons/rentIcon.png',
                                        'Association Dues' => 'build/assets/icons/associationIcon.png',
                                        default            => 'build/assets/icons/defaultIcon.png',
                                    },
                                    'title'   => ucfirst($bill->type),
                                    'amount'  => '₱' . number_format($bill->amount, 2),
                                    'dueDate' => $bill->due_date->format('M d'),
                                    'status'  => $bill->status,
                                    'color'   => match (strtolower($bill->type)) {
                                        'electricity'      => 'bg-[#F59E0B]',
                                        'water'            => 'bg-[#06B6D4]',
                                        'rent'             => 'bg-[#0038A8]',
                                        'association dues' => 'bg-[#10B981]',
                                        default            => 'bg-gray-100',
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
