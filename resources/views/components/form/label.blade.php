@props([
    'for',
    'show' => true,
])

@if($show)
    <label for="{{ $for }}" {{ $attributes->class(['app-form-label']) }}>
        {{ $slot }}
    </label>
@endif