@props(['id', 'transactionID', 'amount'])

@php
    $onlineModalId = 'onlinePaymentModal-' . $transactionID;
    $cashModalId = 'cashPaymentModal-' . $transactionID;
@endphp

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">
                <div class=" bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    {{-- ... Header code ... --}}

                    <div class="flex flex-col gap-4 p-4 ">
                        {{-- Button for Online Payment: Hides current ID, Shows Unique Online ID --}}
                        <button id="onlinePaymentBtn"
                            onclick="document.getElementById('{{ $id }}').classList.add('hidden');document.getElementById('{{ $onlineModalId }}').classList.remove('hidden');"
                            class="block w-full appearance-none rounded-md border border-gray-300 text-[#364153] bg-[#F3F4F6] py-3 shadow-sm focus:border-primary focus:outline-none ring-primary sm:text-sm transition-all duration-200 ease-in-out hover:ring-1">
                        Online Payment
                        </button>

                        {{-- Button for Cash Payment: Hides current ID, Shows Unique Cash ID --}}
                        <button id="cashPaymentBtn"
                            onclick="document.getElementById('{{ $id }}').classList.add('hidden');document.getElementById('{{ $cashModalId }}').classList.remove('hidden');"
                            class="block w-full appearance-none rounded-md border border-gray-300 text-[#364153] bg-[#F3F4F6] py-3 shadow-sm focus:border-primary focus:outline-none ring-primary sm:text-sm transition-all duration-200 ease-in-out hover:ring-1">
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


<x-online-payment-modal id="{{ $onlineModalId }}" :transactionID="$transactionID" :amount='$amount' />
<x-cash-payment-modal id="{{ $cashModalId }}" :transactionID="$transactionID" />
