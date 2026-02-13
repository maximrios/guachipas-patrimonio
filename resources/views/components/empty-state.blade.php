<div class="empty-state {{ $class }}" {{ $attributes }}>
    <div class="empty-state__icon">
        <i class="{{ $icon }}"></i>
    </div>

    <h4 class="empty-state__title">{{ $title }}</h4>

    @if($description)
        <p class="empty-state__description">{{ $description }}</p>
    @endif

    {{ $slot }}

    @if($hasAction())
        <div class="empty-state__action">
            <x-button :href="$actionUrl" :variant="$actionVariant">
                {{ $actionText }}
            </x-button>
        </div>
    @endif
</div>
