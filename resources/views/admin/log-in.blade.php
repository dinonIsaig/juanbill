@extends('layouts.app')

@section('title', 'Log In')
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
-
    <!-- Right Side - Form -->
    <div class="flex flex-col justify-center items center w-full p-5">
        <div class="flex justify-center flex-col items-center max-w-md mx-auto w-full">
            <!-- Logo -->
            <div class="absolute top-4 right-4 flex items-center gap-2 mb-12">
                <div class="p-2 rounded-lg">
                <a href="{{ route('account-type') }}" class="p-2 rounded-lg hover:opacity-80 transition-opacity ">
                    <img src="{{ asset('build/assets/images/adminPage/wordLogo.png') }}" alt="Logo">
                </a>
                </div>
            </div>

            <!-- Welcome Text -->
            <h2 class="welcome-text text-admin mb-2">Welcome Admin!</h2>
            <p class="welcome-description">Stay updated with your latest bills</p>

            <!-- Log-in Form -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-4 flex justify-center flex-col w-full">
                @csrf

                @if($errors->any())
                    <div class="text-red-600 mb-2">
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Username -->
                <div>
                    <label class="input-label">Username</label>
                    <input class="admin-input-field" type="text" name="username" placeholder="Enter your username" required>
                </div>

                <!-- Admin ID -->
                <div>
                    <label class="input-label">Admin ID</label>
                    <input class="admin-input-field" type="text" name="admin_id" placeholder="Enter your admin id" required>
                </div>

                <!-- Password -->
                <div>
                    <label class="input-label">Password</label>
                    <input class="admin-input-field" type="password" name="password" placeholder="Create a password" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="admin-btn w-full text-lg font-semibold mt-8">Log In</button>
            </form>

            <!-- Login Link -->
            <p class="text-center text-neutral-gray mt-6">
                Don’t have an account? <a href="{{ route('admin.sign-up') }}" class="text-[#CE1126] font-semibold hover:underline">Sign-up</a>
            </p>
        </div>
    </div>


</div>

@endsection
