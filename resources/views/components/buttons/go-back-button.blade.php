@props([
    'href' => '#',
    'useIcon' => true,
    'iconClass' => 'bi bi-arrow-left-short go-back-icon'
])

<a href="{{ $href }}" {{ $attributes->class([
    'go-back-button',
    'w-100',
    'w-md-auto',
    'd-inline-flex',
    'align-items-center',
    'gap-0'
]) }}>
    @if($useIcon)
        <i class="{{ $iconClass }}"></i>
    @endif
    <span>{{ $slot }}</span>
</a>