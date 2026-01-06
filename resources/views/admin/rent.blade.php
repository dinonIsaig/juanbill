@extends('layouts.app')

@section('title', 'Rent')

@section('content')
<div class="flex min-h-screen bg-neutral-light items-start">

    <aside class="sticky top-0 self-start">
        @include('components.admin-sidebar')
    </aside>

    <div class="flex-1 flex flex-col min-h-screen">
        @include('components.admin-topbar')

        <div class="p-8 px-18 max-md:px-8 flex-grow">

            <div class="mb-8">
                <div class="flex items-center mb-2">
                <h1 class="text-4xl font-bold text-[#CE1126]">Rent</h1>
                </div>
                <p class="text-neutral-gray">Manage Rent Transactions</p>
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
                        <h2 class="sm:text-lg md:text-xl font-bold text-text-primary">Rent Dashboard</h2>
                        
                        <button onclick="document.getElementById('admin-filterModal').classList.remove('hidden')"
                            class="admin-filter-btn">
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
                                    <x-admin-bill-transaction :bill="$bill" />
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-4 text-gray-500">
                                                No Rent billing history found.
                                            </td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                    @include('components.admin-bills-footer')
                </div>
            </div>
        </div>
        @include('components.admin-page-footer')
    </div>
</div>
<x-admin-sign-out-modal id="adminSignOutModal" />
<x-admin-filter-modal id="admin-filterModal"/>
<x-add-modal id="addModal" />
<x-edit-modal id="editModal" />
<x-delete-modal id="deleteModal" />

@endsection

@push('scripts')
    @vite('resources/js/charts.js')
    @vite('resources/js/admin-filter.js')
@endpush
