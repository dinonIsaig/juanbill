@extends('layouts.app')

@section('title', 'Info')

@section('content')
<div class="flex min-h-screen bg-[#F3F4F6] items-start">

    <aside class="sticky top-0 self-start z-50">
        @include('components.sidebar')
    </aside>

    <div class="flex-1 flex flex-col w-full min-w-0">
        @include('components.topbar')

        <div class="flex-1 flex flex-col items-center p-6 lg:p-10 space-y-8">
            
            <div class="w-full max-w-6xl h-48 md:h-80 rounded-xl overflow-hidden shadow-sm bg-gray-300">
                <img src="{{ asset('build/assets/images/userPage/banner-2.png') }}"
                     alt="Pool Background" 
                     class="w-full h-full object-cover object-center">
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-neutral-100 w-full max-w-6xl mx-auto overflow-hidden">
                <div class="w-full h-32 md:h-48">
                    <img src="{{ asset('build/assets/images/userPage/info-banner.png') }}" 
                         class="w-full h-full object-cover" alt="JuanBill Header">
                </div>

                <div class="pb-14 pt-8 px-10 md:px-14">
                    <p class="text-neutral-600 leading-relaxed text-base md:text-lg text-justify">
                        Managing utility and association fee payments shouldn't be complicated but for many students 
                        leasing around the Polytechnic University of the Philippines, especially in nearby condominiums 
                        like Maui Residence, it still is. Manual billing, email-based confirmations, and scattered records
                        create delays, errors, and uncertainty for both tenants and administrators. Juan Bill was built 
                        to fix that. We aim to streamline the entire billing process by centralizing utility and 
                        association fee management into a single, reliable platform. By automating billing records, 
                        payment tracking, and verification, the system eliminates unnecessary friction and brings 
                        clarity and transparency to every transaction. This application allows users to easily view 
                        their billing history, track current dues, and make payments directly through the system. At 
                        the same time, administrators are equipped with tools to review and verify manual payments 
                        efficiently, ensuring accountability without slowing down operations.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl">
                @php
                    $team = [
                        ['name' => 'Joyrel Baladjay', 'image' => 'joyrel-baladjay.png'],
                        ['name' => 'John Dinon Isaig', 'image' => 'dinon-isaig.png'],
                        ['name' => 'Gwenyth Lee',         'image' => 'gwen-lee.png'],
                        ['name' => 'Avril Saliba',     'image' => 'avril-saliba.png']
                    ];
                @endphp

                @foreach($team as $member)
                <div class="bg-white rounded-xl shadow-sm p-5 flex flex-col items-center border border-neutral-100 hover:shadow-md transition-all">
                    <img src="{{ asset('build/assets/images/accountTypePage/Logo.png') }}" 
                         class="h-4 mb-4 object-contain opacity-80" alt="JuanBill">
                    
                    <div class="w-full aspect-square mb-4 overflow-hidden rounded-lg shadow-inner border-[3px] border-[#002b5c]/5">
                        <img src="{{ asset('build/assets/images/userPage/memberPictures/' . $member['image']) }}" 
                             alt="{{ $member['name'] }}"
                             class="w-full h-full object-cover">
                    </div>

                    <h3 class="text-[#002b5c] font-bold text-lg text-center leading-tight">{{ $member['name'] }}</h3>
                    <p class="text-neutral-400 text-[10px] uppercase mt-1 font-medium">Project Developer</p>
                </div>
                @endforeach
            </div>

        </div>

        @include('components.page-footer')
    </div>
</div>
@endsection