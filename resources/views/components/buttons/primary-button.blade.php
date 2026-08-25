@props([
    'type' => 'button',
    'useIcon' => false,
    'iconClass' => 'bi bi-arrow-right-short absolute-button-icon end-0',
])

<button type="{{ $type }}" {{ $attributes->class([
    'btn', 'btn-primary-color', 'w-md-auto', 'position-relative' => $useIcon,
]) }}>

    <span>{{ $slot }}</span>
    
    @if($useIcon)
        <i class="{{ $iconClass }}"></i>
    @endif
</button>