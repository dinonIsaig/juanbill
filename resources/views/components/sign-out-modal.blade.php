@props((['id' => 'signOutModal']))

<div>
    <div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black opacity-50"
            onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <div class="bg-white px-4 pb-4 pt-2 sm:p-6 sm:pb-4">

                        <div class="flex mb-6 justify-center">
                            <img src="{{asset('build/assets/images/userPage/wordLogo.png')}}" alt="" class="w-auto h-10">
                        </div>

                        <div class="space-y-2 rounded-xl shadow-2xl border border-gray-200 bg-white px-8 pb-8 max-md:px-4">
                            <div class="text-center p-8 space-y-2">
                                <h2 class="text-3xl font-bold text-primary flex justify-center">Sign Out</h2>

                                <p class="text-gray-500 text-sm px-8 max-md:px-4">Signing out will end your session. Are you are you want to sign out?</p>
                            </div>
                            <form action="{{ route('user.log-out') }}" method="POST" class="space-y-4">
                                @csrf

                                <button type="submit" class="normal-btn w-full text-center"
                                    onclick="document.getElementById('signOutModal').classlist.remove('hidden')">
                                    Sign Out
                                </button>

                                <button type="button"
                                    onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="back-btn w-full">
                                    Cancel
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

