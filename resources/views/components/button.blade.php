@php
    $baseClasses = 'x-btn';
    $classes = collect([
        $baseClasses,
        'x-btn--' . $variant,
        'x-btn--' . $size,
        $rounded ? 'x-btn--rounded' : '',
        $disabled ? 'x-btn--disabled' : '',
        $loading ? 'x-btn--loading' : '',
        $class,
    ])->filter()->implode(' ');
@endphp

@if($isLink())
    <a
        href="{{ $disabled ? 'javascript:void(0)' : $href }}"
        class="{{ $classes }}"
        @if($target) target="{{ $target }}" @endif
        @if($disabled) aria-disabled="true" tabindex="-1" @endif
        {{ $attributes->except(['class', 'href', 'target']) }}
    >
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }}"></i>
        @endif

        <span>{{ $slot }}</span>

        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }}"></i>
        @endif
    </a>
@else
    <button
        type="{{ $type }}"
        class="{{ $classes }}"
        @if($disabled || $loading) disabled @endif
        {{ $attributes->except(['class', 'type']) }}
    >
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }}"></i>
        @endif

        <span>{{ $slot }}</span>

        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }}"></i>
        @endif
    </button>
@endif
