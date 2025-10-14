@php
    $inputAttributes = $attributes->only(['required', 'disabled', 'readonly', 'aria-label', 'aria-describedby', 'data-*']);
    $containerAttributes = $attributes->except(['required', 'disabled', 'readonly', 'aria-label', 'aria-describedby', 'data-*']);
@endphp

<div {{ $containerAttributes->class(['form-check']) }}>
    <input
        {{ $inputAttributes }}
        name="{{ $name }}"
        type="checkbox"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $isChecked ? 'checked' : '' }}
        {{ $hasErrors ? 'aria-describedby="validation-' . $name . '-feedback"' : '' }}
        class="form-check-input{{ $hasErrors ? ' is-invalid' : '' }}"
    />
    <label class="form-check-label" for="{{ $id }}">
        {!! $label !!}
    </label>
</div>
