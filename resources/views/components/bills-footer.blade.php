@props(['items'])

<div class="flex items-center justify-between mt-6">
    {{-- Check if items is a Paginator --}}
    @php
        $isPaginator = $items instanceof \Illuminate\Pagination\LengthAwarePaginator ||
                       $items instanceof \Illuminate\Contracts\Pagination\Paginator;
    @endphp

    <div class="transaction-counter font-medium">
        @if ($isPaginator)
            Showing {{ $items->firstItem() ?? 0 }} to {{ $items->lastItem() ?? 0 }} of {{ $items->total() }} transactions
        @else
            Showing {{ $items->count() }} transactions
        @endif
    </div>

    {{-- Only show buttons if it is a paginator --}}
    @if ($isPaginator && $items->hasPages())
        <div class="flex gap-2">
            {{-- Previous Button --}}
            @if ($items->onFirstPage())
                <span class="pagination-btn cursor-not-allowed text-gray-400 border-gray-200 bg-gray-50">Previous</span>
            @else
                <a href="{{ $items->previousPageUrl() }}" class="pagination-btn hover:bg-gray-100">Previous</a>
            @endif

            {{-- Next Button --}}
            @if ($items->hasMorePages())
                <a href="{{ $items->nextPageUrl() }}" class="pagination-btn hover:bg-gray-100">Next</a>
            @else
                <span class="pagination-btn cursor-not-allowed text-gray-400 border-gray-200 bg-gray-50">Next</span>
            @endif
        </div>
    @endif
</div>
