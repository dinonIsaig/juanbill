@extends('layouts.app')

@section('title', 'Help & Support')

@section('content')
    <div class="flex h-screen bg-neutral-light overflow-hidden">

        {{-- Updated to admin-specific sidebar --}}
        @include('components.admin-sidebar')

        <div class="flex-1 flex flex-col min-w-0 overflow-auto">
            {{-- Updated to admin-specific topbar --}}
            @include('components.admin-topbar')

            <div class="p-8 px-18 max-md:px-8">

                <div class="mb-8">
                    {{-- Changed text-primary to text-admin to match admin branding --}}
                    <div class="flex items-center text-admin mb-2 3xl:mb-120">
                        <h1 class="text-4xl font-bold">Help & Support</h1>
                        <svg class="w-10 h-10 mb-1 ml-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                        </svg>
                    </div>
                    <p class="text-neutral-gray inline-block">Find answers to common questions regarding admin management</p>
                </div>

                <div class="max-w-4xl mx-auto mt-12 mb-20">
                    <h2 class="text-2xl font-bold text-center text-text-primary mb-8">Frequently Asked Questions</h2>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-neutral-100">
                        @php
                            $faqs = [
                                [
                                    'question' => 'How do I add a new billing record?',
                                    'answer'   => 'Navigate to the specific utility section (Electricity, Water, etc.) and click the "+ Add" button. Fill in the Unit ID, Due Date, and Amount; other fields like consumption are auto-calculated.'
                                ],
                                [
                                    'question' => 'How are Electricity and Water consumption calculated?',
                                    'answer'   => 'Consumption is auto-calculated based on the amount entered. Electricity uses a divisor of 12, while Water uses a divisor of 35.'
                                ],
                                [
                                    'question' => 'Can I delete a transaction?',
                                    'answer'   => 'Yes, using the "Delete" button in the billing dashboard. You will need to provide the specific Transaction ID to confirm deletion.'
                                ],
                                [
                                    'question' => 'How do I filter records by year or month?',
                                    'answer'   => 'Click the "Filter" button on any billing dashboard to select a specific year, month, or payment status to narrow down the table results.'
                                ],
                                [
                                    'question' => 'Why are the reading start and end dates auto-filled?',
                                    'answer'   => 'To ensure consistency, the system automatically sets the reading start to the first day of the due date\'s month and the reading end to the last day of that month.'
                                ],
                                [
                                    'question' => 'How do I update an admin profile?',
                                    'answer'   => 'Admins can update their basic personal details via the Settings tab. To register a new admin, they must use one of the pre-seeded Admin IDs.'
                                ]
                            ];
                        @endphp

                        @foreach($faqs as $index => $faq)
                            <div class="{{ !$loop->last ? 'border-b border-neutral-100' : '' }}">
                                <button class="w-full flex items-center justify-between p-6 text-left hover:bg-neutral-50 transition-colors duration-200 group cursor-pointer"
                                    onclick="toggleFaq({{ $index }})">
                                    <span class="font-bold text-text-primary group-hover:text-admin transition-colors">{{ $faq['question'] }}</span>
                                    {{-- Changed icon color to text-admin --}}
                                    <svg id="icon-{{ $index }}" class="w-5 h-5 text-admin transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div id="answer-{{ $index }}" class="hidden px-6 pb-6 text-neutral-gray bg-white border-t border-neutral-50 pt-4">
                                    <p class="text-base leading-relaxed">{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @include('components.admin-page-footer')

        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/notification-flash.js')
    <script>
        function toggleFaq(index) {
            const answer = document.getElementById(`answer-${index}`);
            const icon = document.getElementById(`icon-${index}`);

            answer.classList.toggle('hidden');

            if (answer.classList.contains('hidden')) {
                icon.style.transform = 'rotate(0deg)';
            } else {
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>
@endpush