@props(['id' => 'adminSignOutModal'])

<div>
    <div id="{{ $id }}" class="fixed inset-0 hidden z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black opacity-50" 
            onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <div class="bg-white px-4 pb-4 pt-2 sm:p-6 sm:pb-4">


                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('build/assets/images/adminPage/wordLogowhite.png') }}" alt="JuanBill Admin" class="h-10 w-auto">    
                        </div>

                        <div class="space-y-2 rounded-xl shadow-2xl border border-gray-200 bg-white px-8 pb-8 max-md:px-4">
                            <div class="text-center p-8 space-y-2">
                                <h2 class="text-3xl font-bold text-admin flex justify-center">Sign Out</h2>
                                <p class="text-gray-500 text-sm px-8 max-md:px-4">
                                    Signing out will end your session. Are you are you want to sign out?
                                </p>
                            </div>

                            <form action="{{ route('admin.logout') }}" method="POST" class="space-y-4">
                                @csrf

                                <button type="submit" class="admin-normal-btn w-full text-center"
                                    onclick="document.getElementById('adminSignOutModal').classList.remove('hidden')">
                                    Sign out
                                </button>
                            

                                <button type="button" 
                                        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
                                        class="w-full py-4 bg-gray-50 text-gray-400 font-semibold rounded-2xl hover:bg-gray-100 hover:text-gray-600 transition-all">
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