@props(['id', 'transactionID'])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-black/50 "
        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>


    <div class="fixed inset-0 z-10 w-screen ">
        <div class="flex min-h-full items-center justify-center p-4 text-center m-6 sm:items-center sm:p-0">
            <div class="relative overflow-hidden rounded-lg shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                <div class=" bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class="flex flex-col items-center mb-6">
                        <h3 class="text-lg font-bold text-primary" id="modal-title">Transaction ID:</h3>
                        <h3 class="text-lg font-bold text-black">{{$transactionID}}</h3>
                        <h2 class="text-md text-gray-500" >This is also your Voucher Code. Please visit your nearest admin office to pay your bill.</h2>

                    </div>

                    <div class="flex flex-col gap-4 p-4 ">
                    <form action="{{ route('cash', $transactionID) }}" method="POST">
                            @csrf
                            <button type="submit" class="normal-btn w-full">
                                Back to Dashboard
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

