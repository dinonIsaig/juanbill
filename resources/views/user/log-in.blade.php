@extends('layouts.app')

@section('title', 'Log In')
@push('styles')
<style>
    .banner-bg {
        background-image: url("{{ asset('build/assets/images/userPage/banner.png') }}");
        background-size: cover;
        object-fit: cover;
    }
</style>
@endpush

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
                    <img src="{{ asset('build/assets/images/userPage/wordLogo.png') }}" alt="Logo">
                </div>
            </div>

            <!-- Welcome Text -->
            <h2 class="welcome-text text-primary mb-2">Welcome User!</h2>
            <p class="welcome-description">Stay updated with your latest bills</p>

            <!-- Sign Up Form -->
            <form method="POST" action="{{ route('user.login') }}" class="space-y-4 flex justify-center flex-col w-full">
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

                <div>
                    <label class="input-label">Username</label>
                    <input class="input-field" type="text" name="username" value="{{ old('username') }}" required>
                </div>

                <div>
                    <label class="input-label">Unit Number</label>
                    <input class="input-field" type="text" name="unit_number" value="{{ old('unit_number') }}" required>
                </div>

                <div>
                    <label class="input-label">Password</label>
                    <input class="input-field" type="password" name="password" required>
                </div>

                <button type="submit" class="user-btn w-full text-lg font-semibold mt-8">Log In</button>
            </form>

            <!-- Login Link -->
            <p class="text-center text-neutral-gray mt-6">
                Don’t have an account? <a href="{{ route('user.sign-up') }}" class="text-primary font-semibold hover:underline">Sign-up</a>
            </p>
        </div>
    </div>


</div>

@endsection

@push('scripts')
    @vite('resources/js/notification-flash.js')
@endpush
