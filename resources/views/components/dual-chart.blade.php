@props([
    'elecData',
    'waterData',
    'year' => date('Y'),
    'id' => 'dashboardChart',
    'route' => 'user.dashboard', // Default route
    'yearParam' => 'year'
])

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-medium text-primary">Monthly Billing Breakdown</h2>
    </div>

    {{-- Canvas Container --}}
    <div class="relative h-80 w-full mb-4">
        <canvas id="{{ $id }}"></canvas>
    </div>

    {{-- Year Navigation (Copied style from Annual Chart) --}}
    <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
        <div class="bg-gray-100 rounded-lg p-1 flex items-center">
            {{-- Prev Year Button --}}
            <a href="{{ route($route, array_merge(request()->query(), [$yearParam => $year - 1])) }}"
                class="px-3 py-1 text-sm font-medium text-gray-600 hover:bg-white hover:shadow-sm rounded-md transition-all">
                &larr; {{ $year - 1 }}
            </a>

            {{-- Current Year Display --}}
            <span class="px-4 py-1 text-sm font-bold mx-2 border-x border-gray-300 text-gray-700">
                {{ $year }}
            </span>

            {{-- Next Year Button --}}
            <a href="{{ route($route, array_merge(request()->query(), [$yearParam => $year + 1])) }}"
                class="px-3 py-1 text-sm font-medium text-gray-600 hover:bg-white hover:shadow-sm rounded-md transition-all">
                {{ $year + 1 }} &rarr;
            </a>
        </div>
    </div>
</div>

{{-- Initialize the Dual Chart --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.initDualChart === 'function') {
            window.initDualChart(
                '{{ $id }}',
                '{{ $year }}',
                @json($elecData),
                @json($waterData)
            );
        }
    });
</script>
