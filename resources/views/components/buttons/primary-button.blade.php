@props([
    'type' => 'button',
    'useIcon' => true,
    'iconClass' => 'bi bi-arrow-right-short absolute-input-icon end-0',
])

<button type="{{ $type }}" {{ $attributes->class([
    'btn', 'primary-button', 'w-md-auto', 'position-relative' => $useIcon,
]) }}>

    <span>{{ $slot }}</span>
    
    @if($useIcon)
        <i class="{{ $iconClass }}"></i>
    @endif
</button>