@php
    if ($title === 'Electricity') {
        $route = 'user.electricity';
    } elseif ($title === 'Water') {
        $route = 'user.water';
    } elseif ($title === 'Rent') {
        $route = 'user.rent';
    } elseif ($title === 'Association Dues') {
        $route = 'user.association';
    } else {
        $route = 'user.dashboard';
    }
    if ($status === 'Overdue') {
        $statusColor = 'text-red-600';
        $borderColor = 'border-1 bg-red-50 border-red-100';
        $dueDate = 'Overdue';
    } else {
        $statusColor = 'text-black';
        $borderColor = 'border-0';
    }
@endphp

<a href="{{ route($route) }}">
<div class="{{$borderColor}} {{ $statusColor }} flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition cursor-pointer">
    <div class="w-12 h-12 {{ $color }} rounded-lg flex items-center justify-center text-white text-lg">
        <img src="{{ asset($icon) }}" alt="{{ $title }} icon" class="w-auto h-auto object-contain">
    </div>
    <div class="flex-1">
        <h3 class="font-semibold text-text-primary">{{ $title }}</h3>
        <p class="text-xs">{{ $dueDate }}</p>
    </div>
    <div class="text-right">
        <p class="font-bold text-lg text-text-primary">{{ $amount }}</p>
    </div>
</div>
</a>
