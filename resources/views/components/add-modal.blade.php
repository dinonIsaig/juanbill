@props(['id' => 'addModal', 'type'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50"
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-overdue-text" id="modal-title">Add Transaction</h3>
                        <p class="text-sm text-gray-500 pb-3 border-b border-gray-200">Fill in the form below</p>
                    </div>

                    <div class="space-y-4">
                        <form action="{{ route('admin.' . $type . '.store') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Unit Number</label>
                                    <input name="unit_id" required class="admin-input" placeholder="e.g. 1005">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Due Date</label>
                                    <input type="date" name="due_date" required class="admin-input">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Date Paid (Optional)</label>
                                    <input type="date" id="addDatePaidInput" name="date_paid" class="admin-input disabled:bg-gray-200 disabled:cursor-not-allowed disabled:text-gray-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Amount</label>
                                    <input name="amount" required class="admin-input" placeholder="0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Status</label>
                                    <select name="status" id="addStatusSelect" required class="admin-input">
                                        <option value="Unpaid" selected>Unpaid</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Overdue">Overdue</option>
                                    </select>
                                </div>
                                <div class="pt-2 flex flex-col gap-3">
                                    <button type="submit" class="admin-add-btn justify-center">Add Transaction</button>
                                    <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="cancel-btn">Cancel</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @vite('resources/js/modal-checkers.js')
@endpush
