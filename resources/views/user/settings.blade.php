@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="flex h-screen bg-neutral-light">

        @include('components.sidebar')

        <div class="flex-1 overflow-auto">
            @include('components.topbar')

            <div class="p-8 px-18 max-md:px-8 mb-70 max-md:mb-0">

                <div class="mb-8">
                    @if (session('error'))
                        <div class="mb-4 rounded-md bg-red-50 p-3 max-w-xl error-alert"
                            data-open-modal-id="editInformationModal">
                            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="mb-4 rounded-md bg-green-50 p-3 max-w-xl success-alert"
                            data-open-modal-id="editInformationModal">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    @endif
                    <div class="flex gap-2">
                        <img src="{{ asset('build\assets\icons\settingBlue.svg') }}" alt="Icon">
                        <h1 class="text-4xl font-bold text-primary mb-2">Settings</h1>
                    </div>
                    <p class="text-neutral-gray inline-block">Manage your account and billing information</p>
                </div>

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
                                    <input type="text" class="input-field-small" value="{{ Auth::user()->first_name }}"
                                        disabled>
                                </div>

                                <div>
                                    <label class="input-label-small">Last Name</label>
                                    <input type="text" class="input-field-small" value="{{ Auth::user()->last_name }}"
                                        disabled>
                                </div>

                                <div>
                                    <label class="input-label-small">Middle Name</label>
                                    <input type="text" class="input-field-small" value="{{ Auth::user()->middle_name }}"
                                        disabled>
                                </div>

                            </div>

                            <div>
                                <label class="input-label-small">Username</label>
                                <input type="text" class="input-field-small" value="{{ Auth::user()->username }}"
                                    disabled>
                            </div>
                            <div>
                                <label class="input-label-small">Email</label>
                                <input type="email" class="input-field-small" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div>
                                <label class="input-label-small">Contact Number</label>
                                <input type="text" class="input-field-small" value="{{ Auth::user()->contact_no }}"
                                    disabled>
                            </div>

                            <div class="justify-end flex mt-6">
                                <div>
                                    <button type="button"
                                        onclick="document.getElementById('editInformationModal').classList.remove('hidden')"
                                        class="normal-btn">
                                        Edit Information
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @include('components.change-password')

            </div>

            @include('components.page-footer')

        </div>
    </div>
    <x-edit-information-modal id="editInformationModal" />
@endsection

@push('scripts')
    @vite('resources/js/notification-flash.js')
    @vite('resources/js/toggle-password')
@endpush
