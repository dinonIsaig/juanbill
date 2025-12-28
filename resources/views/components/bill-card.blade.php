<div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition cursor-pointer">
    <div class="w-12 h-12 {{ $color }} rounded-lg flex items-center justify-center text-white text-lg">
        {{ $icon ?? '📄' }}
    </div>
    <div class="flex-1">
        <h3 class="font-semibold text-text-primary">{{ $title }}</h3>
        <p class="text-xs text-neutral-gray">{{ $dueDate }}</p>
    </div>
    <div class="text-right">
        <p class="font-bold text-lg text-text-primary">{{ $amount }}</p>
    </div>
</div>
