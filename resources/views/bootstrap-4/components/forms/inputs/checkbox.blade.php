<input
    name="{{ $name }}"
    type="checkbox"
    id="{{ $id }}"
    value="{{ $value }}"
    @checked($isChecked)
    {{ $hasErrors ? 'aria-describedby="validation-' . $name . '-feedback"' : '' }}
    {{ $attributes->class([
        'custom-control-input',
        'is-invalid' => $hasErrors,
    ]) }}
/>
<label class="custom-control-label" for="{{ $id }}">
    {!! $label !!}
</label>