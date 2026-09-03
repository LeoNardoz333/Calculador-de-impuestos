@props([
    'name',
    'label' => null,
    'labelClass' => 'form-check-label pt-2 mb-1',
    'containerClass' => 'col-12',
    'groupClass' => 'app-group-form-input mb-1',
])

<div class="{{ $containerClass }}">
    <div class="{{ $groupClass }}">
        <input type="checkbox" name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->has($name)]) }}>

        @if($label !== null)
            <x-form.label :for="$name" :class="$labelClass">
                {{ $label }}
            </x-form.label>
        @endif

        @error($name)
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>