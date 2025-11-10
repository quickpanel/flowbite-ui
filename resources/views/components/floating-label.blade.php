@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'type' => 'text',
    'size' => 'md',
    'color' => 'gray',
    'disabled' => false,
    'error' => false,
    'label' => null,
    'placeholder' => null,
    'required' => false,
    'value' => null,
])

@php
    // Base input classes updated to support floating label pattern (peer + transparent bg)
    $baseClasses = 'block w-full rounded-lg border text-sm px-2.5 pb-2.5 pt-4 bg-transparent appearance-none focus:outline-none focus:ring-0 peer transition-colors duration-200';

    // Padding sizes (keep vertical rhythm for label)
    $sizeClasses = [
        'sm' => 'px-2.5 pb-2.5 pt-4',
        'md' => 'px-2.5 pb-2.5 pt-4',
        'lg' => 'px-3 pb-3 pt-5',
    ];

    // Color palettes adjusted for transparent background floating inputs
    $colorClasses = [
        'gray' => [
            'normal' => 'text-gray-900 border-gray-300 focus:border-blue-600 dark:text-white dark:border-gray-600 dark:focus:border-blue-500',
            'error'  => 'text-red-900 border-red-500 focus:border-red-500 placeholder-red-700 dark:text-red-500 dark:border-red-500',
        ],
        'blue' => [
            'normal' => 'text-blue-900 border-blue-300 focus:border-blue-600 dark:text-white dark:border-blue-600 dark:focus:border-blue-500',
            'error'  => 'text-red-900 border-red-500 focus:border-red-500 placeholder-red-700 dark:text-red-500 dark:border-red-500',
        ],
    ];

    $inputClasses = $baseClasses . ' ' . ($sizeClasses[$size] ?? $sizeClasses['md']);

    if ($error) {
        $inputClasses .= ' ' . $colorClasses[$color]['error'];
    } else {
        $inputClasses .= ' ' . $colorClasses[$color]['normal'];
    }

    if ($disabled) {
        $inputClasses .= ' opacity-50 cursor-not-allowed';
    }

    // Determine the input's value with precedence:
    // 1) explicit value attribute/prop; 2) slot content; 3) old input for wire:model name
    $explicitValue = $attributes->get('value');
    $slotHasContent = isset($slot) && trim((string) $slot) !== '';
    $finalValue = null;

    if (!is_null($explicitValue)) {
        $finalValue = $explicitValue;
    } elseif ($slotHasContent) {
        $finalValue = (string) $slot;
    } elseif (!empty($name)) {
        $finalValue = old($name);
    }

    // Build a stable id for input/label association
    $inputId = $attributes->get('id')
        ?? ($name ? str_replace(['[',']','.'],'_', $name) : null);
@endphp

<div class="relative">
    <input
        type="{{ $type }}"
        id="{{ $inputId }}"
        {{ $attributes->merge(['class' => $inputClasses])->except('id') }}
        placeholder=" "
        @if($disabled) disabled @endif
        @if($required) required @endif
        @if(!is_null($finalValue)) value="{{ $finalValue }}" @endif
        @isset($name) name="{{ $name }}" @endisset
    />

    @if($label)
        <label for="{{ $inputId }}"
               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    @if($error && is_string($error))
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $error }}</p>
    @endif
</div>
