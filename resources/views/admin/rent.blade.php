@extends('layouts.app')

@section('title', 'Rent')

@if (session('success'))
    <div id="alert-success" class="fixed top-5 right-5 z-[100] flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-300 shadow-lg transition-opacity duration-500" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" onclick="document.getElementById('alert-success').remove()" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endif

@if (session('error'))
    <div id="alert-error" class="fixed top-5 right-5 z-[100] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-300 shadow-lg" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
        </div>
        <button type="button" onclick="document.getElementById('alert-error').remove()" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
        </button>
    </div>
@endif

@section('content')
<div class="flex h-screen bg-neutral-light">

    <aside class="sticky top-0 self-start">
        @include('components.admin-sidebar')
    </aside>

    <div class="flex-1 overflow-auto">
        @include('components.admin-topbar')

        <div class="p-8 px-18 max-md:px-8">

            <div class="mb-2">
                <h1 class="text-4xl font-bold text-overdue-text">Rent</h1>
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
                    @include('components.admin-bills-footer')
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
    @vite('resources/js/admin-filter.js')
@endpush

