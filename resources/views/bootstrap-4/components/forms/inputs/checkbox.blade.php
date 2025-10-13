<div {{ $attributes->class(['custom-control', 'custom-checkbox']) }}>
    <input
        name="{{ $name }}"
        type="checkbox"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $isChecked ? 'checked' : '' }}
        {{ $hasErrors ? 'aria-describedby="validation-' . $name . '-feedback"' : '' }}
        class="custom-control-input{{ $hasErrors ? ' is-invalid' : '' }}"
    />
    <label class="custom-control-label" for="{{ $id }}">
        {!! $label !!}
    </label>
</div>
