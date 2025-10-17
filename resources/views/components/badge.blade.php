@props([
    'type' => 'info',
    'dismissible' => false,
    'text' => '',
    'icon' => true,
    'border' => false,
    'pill' => false,
    'size' => 'md'
])

@php
    $baseClasses = 'inline-flex items-center font-medium';

    $sizeClasses = [
        'sm' => 'text-xs px-2 py-0.5',
        'md' => 'text-sm px-2.5 py-0.5',
        'lg' => 'text-base px-3 py-1',
    ];

    $rounded = $pill ? 'rounded-full' : 'rounded';

    $typeClasses = [
        'info' => 'text-blue-800 bg-blue-100 dark:bg-blue-900 dark:text-blue-300',
        'success' => 'text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300',
        'warning' => 'text-yellow-800 bg-yellow-100 dark:bg-yellow-900 dark:text-yellow-300',
        'error' => 'text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300',
        'danger' => 'text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300',
        'dark' => 'text-gray-800 bg-gray-100 dark:bg-gray-700 dark:text-gray-300',
    ];

    $borderClasses = $border ? 'border' : '';
    $borderTypeClasses = [
        'info' => 'border-blue-400 dark:border-blue-700',
        'success' => 'border-green-400 dark:border-green-700',
        'warning' => 'border-yellow-400 dark:border-yellow-700',
        'error' => 'border-red-400 dark:border-red-700',
        'danger' => 'border-red-400 dark:border-red-700',
        'dark' => 'border-gray-400 dark:border-gray-600',
    ];

    $classes = trim($baseClasses . ' ' . ($sizeClasses[$size] ?? $sizeClasses['md']) . ' ' . $typeClasses[$type] . ' ' . $rounded);
    if ($border) {
        $classes .= ' ' . $borderClasses . ' ' . $borderTypeClasses[$type];
    }

    $iconSvg = '<svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/></svg>';
@endphp

<span
    {{ $attributes->merge(['class' => $classes]) }}
    @if($dismissible)
        x-data="{ show: true }"
        x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    @endif
>
    @if($icon)
        {!! $iconSvg !!}
        <span class="sr-only">{{ ucfirst($type) }}</span>
    @endif

    @if(trim($text) !== '')
        <span>{{ $text }}</span>
    @endif
    {{ $slot }}

    @if($dismissible)
        <button type="button" class="inline-flex items-center ms-2 -me-1.5 p-0.5 rounded-full hover:bg-black/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:hover:bg-white/10" @click="show = false" aria-label="Remove">
            <span class="sr-only">Remove</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    @endif
</span>
