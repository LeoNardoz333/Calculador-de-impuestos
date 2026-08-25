@props([
    'name',
    'label' => null,
    'labelClass' => '',
    'type' => 'text',
    'placeholder' => '',
    'containerClass' => 'col-12',
    'groupClass' => 'app-group-form-input mb-1',
])

<div class="{{ $containerClass }}">
    <div class="{{ $groupClass }}">
        @if($label !==null)
        <x-form.label :for="$name" :class="$labelClass">
            {{ $label }}
        </x-form.label>
        @endif

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ $placeholder }}" value="{{ old($name) }}"
            {{ $attributes->class(['form-control', 'app-form-input', 'is-invalid' => $errors->has($name)]) }}>

        @error($name)
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
