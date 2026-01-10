@extends('layouts.app')

@section('title', 'Settings')

@if (session('success'))
    <div id="alert-success" class="absolute top-10 right-200 z-[100] tracking-wide flex items-center p-4 px-10 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-300 shadow-lg transition-opacity duration-500" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div id="alert-error" class="absolute top-10 right-200 z-[100] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-300 shadow-lg" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
        </div>
    </div>
@endif

@section('content')
    <div class="flex h-screen bg-neutral-light">

        @include('components.admin-sidebar')

        <div class="flex-1 overflow-auto">
            @include('components.topbar', ['color' => 'text-admin'], ['id' => 'admin.topbar'])

            <div class="p-8 px-18 max-md:px-8 mb-70 max-md:mb-0 3xl:mb-120">


                <div class="gap-8 mb-8 grid max-md:grid-cols-1">

                    <div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
                        <div class="flex gap-2">
                            <img src="{{ asset('build/assets/icons/accountIcon.svg') }}" alt="account icon" class="w-6 h-6">
                            <h2 class="text-xl font-bold text-text-primary mb-6">Account Settings Dashboard</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-3 gap-10 max-md:grid-cols-1">
                                <div>
                                    <label class="input-label-small">First Name</label>
                                    <input type="text" class="input-field-small" value="{{ Auth::guard('admin')->user()->first_name }}"
                                        disabled>
                                </div>

                                <div>
                                    <label class="input-label-small">Last Name</label>
                                    <input type="text" class="input-field-small" value="{{ Auth::guard('admin')->user()->last_name  }}"
                                        disabled>
                                </div>

                                <div>
                                    <label class="input-label-small">Middle Name</label>
                                    <input type="text" class="input-field-small" value="{{ Auth::guard('admin')->user()->middle_name }}"
                                        disabled>
                                </div>

                            </div>

                            <div>
                                <label class="input-label-small">Username</label>
                                <input type="text" class="input-field-small" value="{{ Auth::guard('admin')->user()->username }}"
                                    disabled>
                            </div>
                            <div>
                                <label class="input-label-small">Email</label>
                                <input type="email" class="input-field-small" value="{{ Auth::guard('admin')->user()->email }}" disabled>
                            </div>
                            <div>
                                <label class="input-label-small">Contact Number</label>
                                <input type="text" class="input-field-small" value="{{ Auth::guard('admin')->user()->contact_no }}"
                                    disabled>
                            </div>

                            <div class="justify-end flex mt-6">
                                <div>
                                    <button type="button"
                                        onclick="document.getElementById('editAdminInformationModal').classList.remove('hidden')"
                                        class="admin-normal-btn">
                                        Edit Information
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @include('components.admin-change-password')

            </div>

            @include('components.admin-page-footer')

        </div>
    </div>
    <x-admin-edit-information-modal id="editAdminInformationModal"/>
@endsection

@push('scripts')
    @vite('resources/js/notification-flash.js')
    @vite('resources/js/toggle-password')
@endpush
