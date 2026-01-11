@extends('layouts.app')

@section('title', 'Sign Up')

@push('styles')
    <style>
        .banner-bg {
            background-image: url("{{ asset('build/assets/images/userPage/banner.png') }}");
            background-size: cover;
            object-fit: cover;
        }
    </style>
@endpush

@if ($errors->any())
    <div x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 5000)"
        x-transition.duration.500ms
        class="absolute top-10 right-200 z-[100] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-300 shadow-lg"
        role="alert">

        <div class="ms-3 text-sm font-medium">
            <strong class="font-bold">Whoops!</strong>
            <ul class="mt-1 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@section('content')
    <div class="min-h-screen bg-white flex">
        <div class="lg:w-300 bg-blue-900 banner-bg">
        </div>

        <div class="flex flex-col justify-center items-center w-full p-5">

            <div class="max-w-md w-full">

                <div class="absolute top-4 right-4 flex items-center gap-2 mb-12">
                <div class="p-2 rounded-lg">
                    <a href="{{ route('account-type') }}" class="p-2 rounded-lg hover:opacity-80 transition-opacity ">
                        <img src="{{ asset('build/assets/images/userPage/wordLogo.png') }}" alt="Logo">
                    </a>
                </div>
            </div>

                <form method="POST" action="{{ route('user.store') }}" class="w-full">
                    @csrf

                    <div id="step-1" class="transition-opacity duration-300">
                        <div class="text-center mb-10">
                            <h2 class="text-5xl font-bold text-primary mb-2">Create an Account</h2>
                            <p class="text-gray-500">Please enter your personal details</p>
                        </div>

                        <div class="space-y-3">
                            <div>
                                <label class="input-label">First Name</label>
                                <input class="input-field w-full" type="text" name="first_name"
                                    placeholder="Enter your first name" required>
                            </div>

                            <div>
                                <label class="input-label">Middle Name <span
                                        class="text-gray-400 font-normal">(Optional)</span></label>
                                <input class="input-field w-full" type="text" name="middle_name"
                                    placeholder="Enter your middle name">
                            </div>

                            <div>
                                <label class="input-label">Last Name</label>
                                <input class="input-field w-full" type="text" name="last_name"
                                    placeholder="Enter your last name" required>
                            </div>

                            <div>
                                <label class="input-label">Email Address</label>
                                <input class="input-field w-full" type="email" name="email"
                                    placeholder="name@example.com" required>
                            </div>

                            <div>
                                <label class="input-label">Contact Number</label>
                                <input class="input-field w-full" type="tel" name="contact_no"
                                    placeholder="0912 345 6789 " required>
                            </div>

                            <div>
                                <label class="input-label">Date of Birth</label>
                                <input class="input-field w-full" type="date" name="dob" required>
                            </div>
                        </div>

                        <button type="button" onclick="nextStep('step-1', 'step-2')"
                            class="next-btn w-full mt-10 flex justify-center items-center gap-2">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>

                    <div id="step-2" class="hidden transition-opacity duration-300">
                        <div class="text-center mb-10">
                            <h2 class="text-3xl font-bold text-primary mb-2">Welcome User!</h2>
                            <p class="text-gray-500">Setup your login credentials</p>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="input-label">Username</label>
                                <input class="input-field w-full" type="text" name="username"
                                    placeholder="Create a unique username" required>
                            </div>

                            <div>
                                <label class="input-label">Unit Number</label>
                                <input class="input-field w-full" type="text" name="unit_number"
                                    placeholder="Enter your unit number" required>
                            </div>

                            <div>
                                <label class="input-label">Password</label>
                                <input class="input-field w-full" type="password" id="password" name="password"
                                    placeholder="Create a strong password" required>
                            </div>

                            <div>
                                <label class="input-label">Confirm Password</label>
                                <input class="input-field w-full" type="password" id="confirm_password" name="password_confirmation"
                                    placeholder="Re-enter your password" required>
                            </div>

                            <div class="flex items-center gap-2">
                                <input id="toggle_show_password" type="checkbox" class="h-4 w-4">
                                <label for="toggle_show_password" class="text-sm">Show passwords</label>
                            </div>

                        </div>

                        <div class="flex gap-4 mt-10">
                            <button type="button" onclick="prevStep('step-2', 'step-1')" class="back-btn">
                                Back
                            </button>

                            <button type="submit" class="w-full user-btn text-lg font-semibold">
                                Sign Up
                            </button>
                        </div>
                    </div>

                </form>

                <p class="text-center text-neutral-gray mt-8 text-sm">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-primary font-bold hover:underline">Login here</a>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/toggle-password.js')
@endpush
