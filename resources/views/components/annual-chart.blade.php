@props([
    'year',
    'route',     // The route name to reload (e.g., 'user.electricity')
    'data',      // The array of 12 numbers
    'label',     // Chart Title (e.g., 'Electricity Consumption')
    'unit' => '', // Unit suffix (e.g., 'kWh')
    'color' => '#1e3a8a',
    'id' => 'annualChart' // Unique ID in case you have 2 charts on 1 page
])

<div class="bg-white rounded-lg p-8 relative flex flex-col max-md:p-4 space-y-5">

    {{-- Canvas Area --}}
    <div class="h-80 w-full relative">
        <canvas id="{{ $id }}"></canvas>
    </div>

    {{-- Header with Navigation --}}
    <div class="flex flex-col sm:flex-row justify-center items-center mb-6 gap-4">
        <div class=" bg-gray-100 rounded-lg p-1">
            {{-- Prev Year Button --}}
            <a href="{{ route($route, array_merge(request()->query(), ['year' => $year - 1])) }}"
                class="px-3 py-1 text-sm font-medium text-gray-600 hover:bg-white hover:shadow-sm rounded-md transition-all">
                &larr; {{ $year - 1 }}
            </a>

            {{-- Current Year --}}
            <span class="px-4 py-1 text-sm font-bold mx-2 border-x border-gray-300"
                  style="color: {{ $color }};">
                {{ $year }}
            </span>

            {{-- Next Year Button --}}
            <a href="{{ route($route, array_merge(request()->query(), ['year' => $year + 1])) }}"
                class="px-3 py-1 text-sm font-medium text-gray-600 hover:bg-white hover:shadow-sm rounded-md transition-all">
                {{ $year + 1 }} &rarr;
            </a>
        </div>
    </div>
</div>

{{-- Initialize the Chart --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.initAnnualChart === 'function') {
            window.initAnnualChart(
                '{{ $id }}',
                '{{ $label }}',
                @json($data),
                '{{ $unit }}',
                '{{ $color }}'
            );
        }
    });
</script>
