@props(['id' => 'addModal'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>


    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-overdue-text" id="modal-title ">Add Transaction</h3>
                        <p class="text-sm text-gray-500 pb-3 border-b border-gray-200">Fill in the form below</p>
                    </div>

                    <div class="space-y-4">
                        <form action="{{ route('admin.association.store') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Transaction ID</label>
                                    <input type="text" name="TransactionID" required class="block w-full rounded-md border border-gray-200 bg-gray-50 py-2.5 px-3 text-gray-500 sm:text-sm" placeholder="e.g. TXN-101">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Due Date</label>
                                    <input type="date" name="DueDate" required class="block w-full rounded-md border border-gray-200 bg-gray-50 py-2.5 px-3 text-gray-500 sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Amount</label>
                                    <input type="number" step="0.01" name="Amount" required class="block w-full rounded-md border border-gray-200 bg-gray-50 py-2.5 px-3 text-gray-500 sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Unit</label>
                                    <input type="number" name="Unit" required class="block w-full rounded-md border border-gray-200 bg-gray-50 py-2.5 px-3 text-gray-500 sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Status</label>
                                    <select name="Status" required class="block w-full rounded-md border border-gray-200 bg-gray-50 py-2.5 px-3 text-gray-500 sm:text-sm">
                                        <option value="Paid">Paid</option>
                                        <option value="Pending">Pending</option>
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





