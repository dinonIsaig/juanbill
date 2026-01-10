@props(['id' => 'editAdminInformationModal'])

@php
    $admin = Auth::guard('admin')->user();
@endphp

<div>
    <div id="{{ $id }}" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black opacity-50"
            onclick="document.getElementById('{{ $id }}').classList.add('hidden')"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md">

                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-red-600" id="modal-title">Edit Admin Information</h3>
                            <p class="text-sm text-gray-500">Update your administrator details below</p>
                        </div>

                        <div class="space-y-4">
                            <form action="{{ route('admin.settings.updateProfile') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PATCH') 

                                <div>
                                    <label class="input-label-modal">First Name</label>
                                    <input name="first_name" type="text" class="input-field-modal" value="{{ old('first_name', $admin->first_name) }}" required>
                                    @error('first_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="input-label-modal">Middle Name (Optional)</label>
                                    <input name="middle_name" type="text" class="input-field-modal" value="{{ old('middle_name', $admin->middle_name) }}">
                                    @error('middle_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="input-label-modal">Last Name</label>
                                    <input name="last_name" type="text" class="input-field-modal" value="{{ old('last_name', $admin->last_name) }}" required>
                                    @error('last_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="input-label-modal">Username</label>
                                    <input name="username" type="text" class="input-field-modal" value="{{ old('username', $admin->username) }}" required>
                                    @error('username') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="input-label-modal">Email Address</label>
                                    <input name="email" type="email" class="input-field-modal" value="{{ old('email', $admin->email) }}" required>
                                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="input-label-modal">Contact Number</label>
                                    <input name="contact_no" type="text" class="input-field-modal" value="{{ old('contact_no', $admin->contact_no) }}" required>
                                    @error('contact_no') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="flex gap-4 mt-10">
                                    <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="back-btn">
                                        Cancel
                                    </button>

                                    <button type="submit" class="w-full admin-normal-btn text-lg font-semibold">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>