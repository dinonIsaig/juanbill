@extends('layouts.app')

@section('title', 'Rent')

@section('content')

@if (session('success'))
    <div id="alert-success" class="absolute top-10 right-200 z-[100] tracking-wide flex items-center p-4 px-10 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-300 shadow-lg transition-opacity duration-500" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div id="alert-error" class="absolute top-10 right-200 z-[100] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-300 shadow-lg" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
        </div>
    </div>
@endif

<div class="flex h-screen bg-neutral-light">

    @include('components.admin-sidebar')

    <div class="flex-1 overflow-auto">
        @include('components.topbar', ['color' => 'text-admin'])

        <div class="p-8 px-18 max-md:px-8 3xl:mb-120 mb-70 ">

            <div class="mb-2">
                <h1 class="text-4xl font-bold text-overdue-text">Rent Fees</h1>
                <p class="text-neutral-gray inline-block">Manage Rent Fees Transactions</p>
            </div>

            <div class="flex flex-wrap gap-2 p-4 justify-end">
                <button onclick="document.getElementById('addModal').classList.remove('hidden')"
                class="admin-add-btn flex items-center px-3 md:px-4">
                    <svg class="w-4 h-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5V19M5 12H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Add</span>
                </button>

                <button onclick="document.getElementById('editModal').classList.remove('hidden')"
                class="admin-add-btn flex items-center px-3 md:px-4">
                    <svg class="w-4 h-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Edit</span>
                </button>

                <button onclick="document.getElementById('deleteModal').classList.remove('hidden')"
                class="admin-add-btn flex items-center px-3 md:px-4">
                    <svg class="w-4 h-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6h18m-2 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m-6 5v6m4-6v6"/>
                    </svg>
                    <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Delete</span>
                </button>
            </div>

            <div class="gap-8">
                <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="sm:text-lg md:text-xl font-bold text-text-primary">Rent Fees Dashboard</h2>

                        <button onclick="document.getElementById('adminfilterModal').classList.remove('hidden')"class="admin-filter-btn flex items-center px-3 md:px-4">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 6H21M6 12H18M10 18H14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Filter</span>
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
                                    <th class="table-headers">Unit</th>
                                    <th class="table-headers">Status</th>

                                </tr>
                            </thead>
                                <tbody>
                                    @forelse($bills as $bill)
                                        <x-admin-association-transaction :bill="$bill" />
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center p-4 text-gray-500">
                                                    No rent billing history found.
                                                </td>
                                            </tr>
                                        @endforelse
                                </tbody>
                        </table>
                    </div>
                    <x-admin-bills-footer :items="$bills" />
                </div>
            </div>

        </div>

        @include('components.admin-page-footer')

    </div>
</div>

<x-admin-filter-modal id="adminfilterModal" :availableYears="$availableYears"/>
<x-add-modal id="addModal" type="rent"/>
<x-edit-modal id="editModal" type="rent" />
<x-delete-modal id="deleteModal" type="rent"/>
@endsection

@push('scripts')
    @vite('resources/js/notification-flash.js')
    @vite('resources/js/admin-filter.js')
@endpush

