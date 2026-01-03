@props(['id' => 'deleteModal'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')">
    </div>


    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-overdue-text" id="modal-title ">Delete Transaction</h3>
                        <p class="text-sm text-gray-500 pb-3 border-b border-gray-200">Enter a Transaction to Delete</p>
                    </div>

                    <div class="space-y-4">
                    
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Unit</label>
                            <div class="relative">
                                <input class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 py-2.5 px-3 text-gray-500 shadow-sm focus:border-overdue-text focus:outline-none focus:ring-1 focus:ring-overdue-text sm:text-sm type="text" placeholder="Unit No." class="placeholder-gray-400" ">

                                </input>

                            </div>
                        </div>

                        <div class="pt-2 flex flex-col gap-3">
                            <button class="admin-add-btn justify-center">
                                Delete
                            </button>
                            
                            <button id="CancelBtn" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="block w-full appearance-none rounded-md  text-[#364153] py-2 ring-primary sm:text-sm hover:bg-[#F3F4F6] transition-all duration-300 ease-in-out">
                            Cancel
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





