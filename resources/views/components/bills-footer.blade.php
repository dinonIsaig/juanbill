<div class="flex items-center justify-between mt-6">

    {{-- LEFT SIDE: "Showing X to Y of Z results" --}}
    <div class="transaction-counter font-medium">
        Showing
        {{-- firstItem() = The number of the first item on this page (e.g. 1) --}}
        <span class="transaction-counter">{{ $bills->firstItem() ?? 0 }}</span>
        to
        {{-- lastItem() = The number of the last item on this page (e.g. 10) --}}
        <span class="transaction-counter">{{ $bills->lastItem() ?? 0 }}</span>
        of
        {{-- total() = Total items in database --}}
        <span class="transaction-counter">{{ $bills->total() }}</span>
        transactions
    </div>

    {{-- RIGHT SIDE: Buttons --}}
    <div class="flex gap-2">

        {{-- PREVIOUS BUTTON --}}
        {{-- onFirstPage() returns true if we are on page 1 --}}
        @if ($bills->onFirstPage())
            {{-- Disabled State --}}
            <span class="pagination-btn cursor-not-allowed border-gray-300 hover:bg-gray-300">
                Previous
            </span>
        @else
            {{-- Active Link --}}
            <a href="{{ $bills->previousPageUrl() }}"
            class="pagination-btn">
                Previous
            </a>
        @endif

        {{-- NEXT BUTTON --}}
        {{-- hasMorePages() returns true if there is a next page --}}
        @if ($bills->hasMorePages())
            {{-- Active Link --}}
            <a href="{{ $bills->nextPageUrl() }}"
            class="pagination-btn">
                Next
            </a>
        @else
            {{-- Disabled State --}}
            <span class="pagination-btn cursor-not-allowed border-gray-300 hover:bg-gray-300">
                Next
            </span>
        @endif

    </div>
</div>
