@props(['id' => 'adminfilterModal', 'availableYears' => []])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 opacity-50 bg-black"
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-admin" id="modal-title">Filter Transactions</h3>
                        <p class="text-sm text-gray-500">Refine your search with multiple criteria</p>
                    </div>

                    {{-- FORM START: Submits to current URL --}}
                    <form method="GET" action="">
                        <div class="space-y-4">

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">TransactionID</label>
                                <div class="relative">
                                    <input name="TransactionID"
                                        class="admin-input"
                                        type="text" placeholder="Enter ID to find">
                                </div>
                            </div>

                            {{-- Dynamic Year Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                                <div class="relative">
                                    <select name="year" class="admin-input">
                                        <option value="all">All Years</option>
                                        @foreach($availableYears as $yearOption)
                                            <option value="{{ $yearOption }}" {{ request('year') == $yearOption ? 'selected' : '' }}>
                                                {{ $yearOption }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            {{-- Month Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                                <div class="relative">
                                    <select name="month" class="admin-input">
                                        <option value="all">All Months</option>
                                        @foreach(range(1, 12) as $m)
                                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            {{-- Status Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                                <div class="relative">
                                    <select name="status" class="admin-input">
                                        <option value="all">All Statuses</option>
                                        <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Unpaid" {{ request('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="Overdue" {{ request('status') == 'Overdue' ? 'selected' : '' }}>Overdue</option>
                                    </select>

                                </div>
                            </div>

                            <div class="pt-2 space-y-2">
                                <button type="submit" class="admin-add-btn w-full justify-center">
                                    Apply Filters
                                </button>
                                <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="cancel-btn">
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
