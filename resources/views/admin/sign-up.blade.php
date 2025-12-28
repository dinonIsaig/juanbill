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
            <div class="flex items-center gap-2 mb-12">
                <div class="p-2 rounded-lg">
                    <img src="{{ asset('build/assets/images/adminPage/logo.png') }}" alt="Logo">
                </div>
                <span class="font-semibold text-xl text-text-primary">JuanBIll</span>
            </div>

            <!-- Welcome Text -->
            <h2 class="welcome-text text-[#CE1126] mb-2">Welcome Admin!</h2>
            <p class="welcome-description">Create your account to get started</p>

            <!-- Sign Up Form -->
            <form method="POST" action="#" class="space-y- flex justify-center flex-col w-full">
                @csrf

                <!-- Username -->
                <div>
                    <label class="input-label">Username</label>
                    <input class="input-field" type="text" name="username" placeholder="Enter your username" required>
                </div>

                <!-- Unit Number -->
                <div>
                    <label class="input-label">Admin ID</label>
                    <input class="input-field" type="text" name="unit_number" placeholder="Enter your Admin ID" required>
                </div>

                <!-- Password -->
                <div>
                    <label class="input-label">Password</label>
                    <input class="input-field" type="password" name="password" placeholder="Create a password" required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="input-label">Confirm Password</label>
                    <input class="input-field" type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="admin-btn w-full text-lg font-semibold mt-8">Sign Up</button>
            </form>

            <!-- Login Link -->
            <p class="text-center text-neutral-gray mt-6">
                Already have an account? <a href="{{ route('admin.log-in') }}" class="text-primary font-semibold hover:underline">Login</a>
            </p>
        </div>
    </div>


</div>

@endsection
