@props(['id' => 'onlinePaymentModal'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class=" bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class="flex flex-col items-center mb-6">
                        <h3 class="text-lg font-bold text-primary" id="modal-title">You are about to Pay</h3>
                        <h3 class="text-lg font-bold text-black">xx,xxx php</h3>

                    </div>

                    <div class="flex flex-col gap-4 p-4 ">
                      <button onclick="document.getElementById('onlinePaymentModal').classList.add('hidden');document.getElementById('onlinePaymentConfirm').classList.remove('hidden');" class="normal-btn">
                        Proceed
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

<x-online-payment-confirm id="onlinePaymentConfirm" />


