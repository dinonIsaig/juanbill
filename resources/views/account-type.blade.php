@extends('layouts.app')

@section('title', 'Account Type Selection')

@push('styles')
<style>
    body {
        background-image: url("{{ asset('build/assets/images/accountTypePage/AccountTypeBG.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <div class="relative z-10 text-center max-w-xl max-md:w-md rounded-lg shadow-xl p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-2">
            <div class=" p-4 rounded-lg inline-block w-1/2">
                <img src="{{ asset('build/assets/images/accountTypePage/Logo.png') }}" alt="Logo">
            </div>
        </div>

        <!-- Text -->
        <h1 class="text-xl font-bold text-text-primary max-sm:text-md">I'm signing in as...</h1>
        <p class="text-neutral-gray text-lg mb-8 max-sm:text-sm">Select your account type</p>

        <!-- Action Buttons -->
        <div class="space-y-3">
            <a href="{{ route('login') }}" class="block">
                <button class="user-btn w-2/3 text-lg font-semibold">User</button>
            </a>
            <a href="{{ route('admin.log-in') }}" class="block">
                <button class="admin-btn w-2/3 text-lg font-semibold">Admin</button>
            </a>
        </div>
</div>
@endsection
