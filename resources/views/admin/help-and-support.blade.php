@extends('layouts.app')

@section('title', 'Help & Support')

@section('content')
    <div class="flex h-screen bg-neutral-light">

        @include('components.admin-sidebar')

        <div class="flex-1 overflow-auto">
            @include('components.admin-topbar')

            <div class="p-8 px-18 max-md:px-8">

                <div class="mb-8">
                    <div class="flex items-center text-primary mb-2 3xl:mb-120">
                        <h1 class="text-4xl font-bold text-[#CE1126]">Help & Support</h1>
                            <svg class="w-10 h-10 mb-1 ml-2" fill="none" stroke="#CE1126" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
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
                                    'question' => "Where can I see the breakdown of users' utility usage?",
                                    'answer'   => 'The Monthly Billing Summary chart provides a visual overview of your consumption trends for all categories throughout the year.'
                                ],
                                [
                                    'question' => 'Can I manage different types of bills in one place?',
                                    'answer'   => 'Yes, the dashboard allows you to manage Electricity, Water, Rent, and Association Dues through individual category cards.'
                                ],
                                [
                                    'question' => 'How do I find a specific transaction or bill?',
                                    'answer'   => 'You can use the Search Bar at the top of the page to quickly locate specific billing records.'
                                ],
                                [
                                    'question' => 'How can I filter the dashboard to see only overdue bills?',
                                    'answer'   => 'Use the "Filter" button located above the main table. You can sort or filter by Status (to isolate "Unpaid" entries) or by Due Date to identify accounts that have passed their deadline.'
                                ],
                                [
                                    'question' => 'How do I manually add a new billing statement for a unit?',
                                    'answer'   => 'From the Electricity Dashboard, click the "+ Add" button. A modal will appear where you must enter the Unit Number, Due Date, and Amount. You can also set the initial Status to "Unpaid" or "Paid" if the transaction is being recorded after the fact.'
                                ],
                                [
                                    'question' => 'How can I track and compare monthly consumption trends?',
                                    'answer'   => 'Use the Monthly Billing Summary or Monthly Consumption Summary charts. These provide a visual breakdown of average unit consumption across the calendar year, allowing you to identify seasonal spikes.'
                                ],
                                [
                                    'question' => 'How do I manage different billing categories?',
                                    'answer'   => 'The Billing & Payments Overview serves as your central hub. From here, you can select specific modules for Electricity, Water, Rent, and Association Fees'
                                ]
                            ];
                        @endphp

                        @foreach($faqs as $index => $faq)
                            <div class="{{ !$loop->last ? 'border-b border-neutral-100' : '' }}">
                                <button class="w-full flex items-center justify-between p-6 text-left hover:bg-neutral-50 transition-colors duration-200 group cursor-pointer"
                                    onclick="toggleFaq({{ $index }})">
                                    <span class="font-bold text-text-primary">{{ $faq['question'] }}</span>
                                    <svg id="icon-{{ $index }}" class="w-5 h-5 text-blue-600 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="#CE1126">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                              </button>
                              
                              <div id="answer-{{ $index }}" class="hidden px-6 pb-6 text-neutral-700 bg-white">
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
