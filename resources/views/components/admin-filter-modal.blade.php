@props(['id' => 'admin-filterModal'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 opacity-50 bg-black"
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="mb-6">
                        <p class="text-lg font-bold text-admin" id="modal-title">Filter Transactions</p>
                        <p class="text-sm text-gray-500">Refine your search with multiple criteria</p>
                    </div>

                    <div class="space-y-4">

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Month</label>
                            <div class="relative">
                                <select id="filter-month" class="block w-full appearance-none rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-admin focus:outline-none focus:ring-1 focus:ring-admin sm:text-sm">
                                    <option value="all">All Months</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <label class="block text-sm font-bold text-gray-700 mb-1">Building Details</label>

                        <div>
                            <label class="block text-sm font-normal text-gray-700 mb-1">Building</label>
                            <div class="relative">
                                <select id="filter-building" class="block w-full appearance-none rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-admin focus:outline-none focus:ring-1 focus:ring-admin sm:text-sm">
                                    <option value="all">All Buildings</option>
                                    <option value="01">Building 1</option>
                                    <option value="02">Building 2</option>
                                    <option value="03">Building 3</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-normal text-gray-700 mb-1">Floor</label>
                            <div class="relative">
                                <select id="filter-floor" class="block w-full appearance-none rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-admin focus:outline-none focus:ring-1 focus:ring-admin sm:text-sm">
                                    <option value="all">All Floors</option>
                                    <option value="01">1st Floor</option>
                                    <option value="02">2nd Floor</option>
                                    <option value="03">3rd Floor</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        
                        <div> 
                            <label class="block text-sm font-normal text-gray-700 mb-1">Unit Number</label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="filter-unit" 
                                    placeholder="e.g. 10" 
                                    class="block w-full rounded-md border border-gray-300 bg-gray-50 py-2 px-3 shadow-sm focus:border-admin focus:outline-none focus:ring-1 focus:ring-admin sm:text-sm">
                                </div>
                        </div>
                        
                        <div class="pt-2">
                            <button type="button" onclick="adminApplyFilters('{{ $id }}')" class="w-full rounded-md bg-admin px-3 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-admin-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-admin">
                                Apply Filters
                            </button>
                        </div>
                        <button type="button" 
                        onclick="document.getElementById('{{ $id }}').classList.add('hidden'); document.body.style.overflow='auto'" 
                        class="back-btn w-full">
                        Cancel
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
