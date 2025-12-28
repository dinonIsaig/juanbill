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
    <div class="relative z-10 text-center max-w-md">

        <!-- Logo -->
        <div class="flex justify-center mb-12">
            <div class=" p-3 rounded-lg inline-block">
                <img src="{{ asset('build/assets/images/accountTypePage/Logo.png') }}" alt="Logo">
            </div>
        </div>

        <!-- Text -->
        <h1 class="text-4xl font-bold text-text-primary mb-3">I'm signing in as...</h1>
        <p class="text-neutral-gray text-lg mb-12">Select your account type</p>

        <!-- Action Buttons -->
        <div class="space-y-4">
            <a href="{{ route('user.sign-up') }}" class="block">
                <button class="user-btn w-full text-lg font-semibold">User</button>
            </a>
            <a href="">
                <button class="admin-btn w-full text-lg font-semibold">Admin</button>
            </a>
        </div>
</div>
@endsection
