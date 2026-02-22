@props([
    'name',
    'type' => 'text',
    'label' => null,
    'placeholder' => null,
    'value' => null
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="form-label fw-semibold">
            {{ $label }}
        </label>
    @endif

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $type }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'form-control form-control-lg' . ($errors->has($name) ? 'is-invalid' : '')]) }}/>


    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
