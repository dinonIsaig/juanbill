@props(['id' => 'editModal', 'type'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
        <div class="mb-6">
            <h3 class="text-lg font-bold text-overdue-text" id="modal-title">Edit Transaction</h3>
            <p class="text-sm text-gray-500 pb-3 border-b border-gray-200">Specify the Transaction to Edit</p>
        </div>

        <form method="POST" action="{{ route('admin.' . $type . '.update') }}">
            @csrf
            @method('PATCH')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">TransactionID</label>
                    <div class="relative">
                        <input name="TransactionID" required
                            class="admin-input"
                            type="text" placeholder="Enter ID to find">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Date Paid</label>
                    <div class="relative">
                        <input type="date" name="date_paid" class="admin-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Status</label>
                    <div class="relative">
                        <select name="status" required class="admin-input">
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Overdue">Overdue</option>
                        </select>
                    </div>
                </div>

                <div class="pt-2 flex flex-col gap-3">
                    <button type="submit" class="admin-add-btn justify-center">
                        Update Transaction
                    </button>

                    <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
                        class="cancel-btn">
                        Cancel
                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
