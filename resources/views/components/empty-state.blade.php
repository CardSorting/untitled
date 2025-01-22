@props([
    'title' => 'No items found',
    'description' => 'Get started by creating your first item',
    'icon' => 'M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758L5 19m7-7l2.879-2.879M12 12l2.879 2.879M12 12l-2.879 2.879M12 12l-2.879-2.879M12 12l2.879-2.879',
    'action' => null,
    'actionText' => 'Create Item',
])

<div {{ $attributes->merge(['class' => 'empty-state']) }}>
    <div class="empty-state__content">
        <svg class="empty-state__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $icon }}" />
        </svg>
        
        <h3 class="empty-state__title">{{ __($title) }}</h3>
        <p class="empty-state__description">{{ __($description) }}</p>
        
        @if($action)
            <div class="empty-state__action">
                <a href="{{ $action }}" class="empty-state__button">
                    {{ __($actionText) }}
                </a>
            </div>
        @endif
    </div>
</div>