@props(['id' => 'filterModal', 'availableYears' => []])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 opacity-50 bg-black"
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-primary" id="modal-title">Filter Transactions</h3>
                        <p class="text-sm text-gray-500">Refine your search with multiple criteria</p>
                    </div>

                    {{-- FORM START: Submits to current URL --}}
                    <form method="GET" action="">
                        <div class="space-y-4">

                            {{-- Dynamic Year Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                                <div class="relative">
                                    <select name="year" class="block w-full appearance-none rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary sm:text-sm bg-none">
                                        <option value="all">All Years</option>
                                        @foreach($availableYears as $yearOption)
                                            <option value="{{ $yearOption }}" {{ request('year') == $yearOption ? 'selected' : '' }}>
                                                {{ $yearOption }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Month Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                                <div class="relative">
                                    <select name="month" class="block w-full appearance-none rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary sm:text-sm bg-none">
                                        <option value="all">All Months</option>
                                        @foreach(range(1, 12) as $m)
                                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Status Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                                <div class="relative">
                                    <select name="status" class="block w-full appearance-none rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary sm:text-sm bg-none">
                                        <option value="all">All Statuses</option>
                                        <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="Unpaid" {{ request('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="Overdue" {{ request('status') == 'Overdue' ? 'selected' : '' }}>Overdue</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2 space-y-2">
                                <button type="submit" class="w-full rounded-md bg-primary px-3 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-primary-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                                    Apply Filters
                                </button>
                                <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="back-btn w-full">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- FORM END --}}

                </div>
            </div>
        </div>
    </div>
</div>
