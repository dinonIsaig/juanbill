@extends('layouts.app')

@section('title', 'Help & Support')

@section('content')
    <div class="flex h-screen bg-neutral-light">

        @include('components.sidebar')

        <div class="flex-1 overflow-auto">
            @include('components.topbar')

            <div class="p-8 px-18 max-md:px-8">

                <div class="mb-8">
                    <div class="flex items-center text-primary mb-2 3xl:mb-120">
                        <h1 class="text-4xl font-bold">Help & Support</h1>
                            <svg class="w-10 h-10 mb-1 ml-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                            </svg>
                    </div>
                    <p class="text-neutral-gray inline-block">Find answers to common questions and get assistance</p>
                </div>

                <div class="max-w-4xl mx-auto mt-12">
                    <h2 class="text-2xl font-bold text-center text-text-primary mb-8">Frequently Asked Questions</h2>

                    <!-- Frequently Asked Questions -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-neutral-100">
                        @php
                            $faqs = [
                                [
                                    'question' => 'How do I make a payment for my fees?',
                                    'answer'   => 'You can make a payment by navigating to the specific billing section (Electricity, Water, etc.) and clicking the "Pay" button.'
                                ],
                                [
                                    'question' => 'How can I view my payment history?',
                                    'answer'   => 'Your payment history is available in the Dashboard under the "Transaction History" section or within each specific billing category.'
                                ],
                                [
                                    'question' => 'What payment methods are accepted?',
                                    'answer'   => 'JuanBill accpets cashless and cash payment through voucher codes.'
                                ],
                                [
                                    'question' => 'How I can view my fees based on year, month, or day?',
                                    'answer'   => 'Use the filter icon located at the top right of your billing dashboard to sort your fees by specific dates or timeframes.'
                                ],
                                [
                                    'question' => 'How I would be notified if I have overdue fees?',
                                    'answer'   => 'Notifications will appear in your topbar bell icon, and an automated email reminder will be sent to your registered address.'
                                ],
                                [
                                    'question' => 'How I can change my personal details?',
                                    'answer'   => 'Navigate to the "Settings" tab in the sidebar where you can update your contact number and profile information.'
                                ],
                                [
                                    'question' => 'How I can know the status of my fees?',
                                    'answer'   => 'Statuses are color-coded: Green for Paid, Yellow for Pending, and Red for Overdue. You can see these labels next to each bill.'
                                ]
                            ];
                        @endphp

                        @foreach($faqs as $index => $faq)
                            <div class="{{ !$loop->last ? 'border-b border-neutral-100' : '' }}">
                                <button class="w-full flex items-center justify-between p-6 text-left hover:bg-neutral-50 transition-colors duration-200 group cursor-pointer"
                                    onclick="toggleFaq({{ $index }})">
                                    <span class="font-bold text-text-primary">{{ $faq['question'] }}</span>
                                    <svg id="icon-{{ $index }}" class="w-5 h-5 text-blue-600 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div id="answer-{{ $index }}" class="hidden px-6 pb-6 text-neutral-gray bg-white">
                                    <p class="text-base leading-relaxed">{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @include('components.page-footer')

        </div>
    </div>
@endsection

<!-- Toggle for responses active or hidden -->
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
