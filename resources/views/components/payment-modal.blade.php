@props(['id' => 'paymentModal'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>


    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class=" bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class="flex flex-col items-center mb-6">
                        <h3 class="text-lg font-bold text-primary" id="modal-title">Payment Options</h3>
                        <p class="text-sm text-gray-500">Select a payment option to proceed to your payment</p>
                    </div>

                    <div class="flex flex-col gap-4 p-4 ">
                        <button id="onlinePaymentBtn" onclick="document.getElementById('paymentModal').classList.add('hidden');document.getElementById('onlinePaymentModal').classList.remove('hidden');" class="block w-full appearance-none rounded-md border border-gray-300 text-[#364153] bg-[#F3F4F6] py-3 shadow-sm focus:border-primary focus:outline-none ring-primary sm:text-sm transition-all duration-200 ease-in-out hover:ring-1">
                        Online Payment
                        </button>

                        <button id="cashPaymentBtn" onclick="document.getElementById('paymentModal').classList.add('hidden');document.getElementById('cashPaymentModal').classList.remove('hidden');" class="block w-full appearance-none rounded-md border border-gray-300 text-[#364153] bg-[#F3F4F6] py-3 shadow-sm focus:border-primary focus:outline-none ring-primary sm:text-sm transition-all duration-200 ease-in-out hover:ring-1">
                        Cash Payment
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



<x-online-payment-modal id="onlinePaymentModal" />
<x-cash-payment-modal id="cashPaymentModal" />


