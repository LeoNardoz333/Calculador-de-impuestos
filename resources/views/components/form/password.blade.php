@props([
    'name' => 'password',
    'label' => null,
    'labelClass' => '',
    'placeholder' => '******',
    'containerClass' => 'col-12',
    'groupClass' => 'app-group-form-input mb-1',
    'buttonClass' => 'absolute-input-icon end-0',
    'buttonLabel' => 'Mostrar/ocultar contraseña',
    'iconClass' => 'bi bi-eye-slash',
])

<div class="{{ $containerClass }}">
    <div class="{{ $groupClass }}">
        @if($label !== null)
        <x-form.label :for="$name" :class="$labelClass">
            {{ $label }}
        </x-form.label>
        @endif

        <div class="position-relative">
            <input type="password" name="{{ $name }}" id="{{ $name }}"
                placeholder="{{ $placeholder }}"
                {{ $attributes->class(['form-control', 'app-form-input', 'is-invalid' => $errors->has($name)]) }}>

            <button class="{{ $buttonClass }} icon-button" type="button" id="{{ $name }}Toggle"
                aria-label="{{ $buttonLabel }}">
                <i class="{{ $iconClass }} app-password-icon" id="{{ $name }}ToggleIcon"></i>
            </button>
        </div>

        @error($name)
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>