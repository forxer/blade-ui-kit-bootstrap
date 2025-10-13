<div {{ $attributes->class(['form-check']) }}>
    <input
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
