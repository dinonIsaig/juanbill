@extends('layouts.app')

@section('title', 'Sign Up')
@push('styles')
<style>
    .banner-bg {
        background-image: url("{{ asset('build/assets/images/adminPage/banner.png') }}");
        background-size: cover;
        object-fit: cover;
    }
</style>
@endpush


@section('content')
<div class="min-h-screen bg-white flex">
    <!-- Banner Image -->
    <div class="lg:w-300 bg-blue-900 banner-bg">
    </div>

    <!-- Right Side - Form -->
    <div class="flex flex-col justify-center items center w-full p-5">
        <div class="flex justify-center flex-col items-center max-w-md mx-auto w-full">
            <!-- Logo -->
            <div class="absolute top-4 right-4 flex items-center gap-2 mb-12">
                <div class="p-2 rounded-lg">
                    <img src="{{ asset('build/assets/images/adminPage/wordLogo.png') }}" alt="Logo">
                </div>
            </div>

            <!-- Sign Up Form -->
            <form method="POST" action="{{ route('admin.store') }}" class="w-full">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Whoops! Something went wrong.</strong>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="step-1" class="transition-opacity duration-300">
                        <div class="text-center mb-10">
                            <h2 class="text-5xl font-bold text-admin mb-2">Create an Account</h2>
                            <p class="text-gray-500">Please enter your personal details</p>
                        </div>

                        <div class="space-y-3">
                            <div>
                                <label class="input-label">First Name</label>
                                <input class="admin-input-field w-full" type="text" name="first_name"
                                    placeholder="Enter your first name" required>
                            </div>

                            <div>
                                <label class="input-label">Middle Name <span
                                        class="text-gray-400 font-normal">(Optional)</span></label>
                                <input class="admin-input-field w-full" type="text" name="middle_name"
                                    placeholder="Enter your middle name">
                            </div>

                            <div>
                                <label class="input-label">Last Name</label>
                                <input class="admin-input-field w-full" type="text" name="last_name"
                                    placeholder="Enter your last name" required>
                            </div>

                            <div>
                                <label class="input-label">Email Address</label>
                                <input class="admin-input-field w-full" type="email" name="email"
                                    placeholder="name@example.com" required>
                            </div>

                            <div>
                                <label class="input-label">Contact Number</label>
                                <input class="admin-input-field w-full" type="tel" name="contact_no"
                                    placeholder="0912 345 6789 " required>
                            </div>

                            <div>
                                <label class="input-label">Date of Birth</label>
                                <input class="admin-input-field w-full" type="date" name="dob" required>
                            </div>
                        </div>

                        <button type="button" onclick="nextStep('step-1', 'step-2')"
                            class="admin-next-btn w-full mt-10 flex justify-center items-center gap-2">
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
                            <h2 class="text-3xl font-bold text-admin mb-2">Welcome Admin!</h2>
                            <p class="text-gray-500">Setup your login credentials</p>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="input-label">Username</label>
                                <input class="admin-input-field w-full" type="text" name="username"
                                    placeholder="Create a unique username" required>
                            </div>

                            <div>
                                <label class="input-label">Admin ID</label>
                                <input class="admin-input-field w-full" type="text" name="admin_id"
                                    placeholder="Enter your admin ID" required>
                            </div>

                            <div>
                                <label class="input-label">Password</label>
                                <input class="admin-input-field w-full" type="password" name="password"
                                    placeholder="Create a strong password" required>
                            </div>

                            <div>
                                <label class="input-label">Confirm Password</label>
                                <input class="admin-input-field w-full" type="password" name="password_confirmation"
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

                            <button type="submit" class="w-full admin-btn text-lg font-semibold">
                                Sign Up
                            </button>
                        </div>
                    </div>

                </form>

            <!-- Login Link -->
            <p class="text-center text-neutral-gray mt-6">
                Already have an account? <a href="{{ route('admin.log-in') }}" class="text-admin font-semibold hover:underline">Login here</a>
            </p>
        </div>
    </div>


</div>

@endsection

@push('scripts')
    @vite('resources/js/toggle-password.js')
@endpush