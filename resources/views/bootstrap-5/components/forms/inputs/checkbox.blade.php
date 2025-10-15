<input
    name="{{ $name }}"
    type="checkbox"
    id="{{ $id }}"
    value="{{ $value }}"
    @checked($isChecked)
    {{ $hasErrors ? 'aria-describedby="validation-'.$name.'-feedback"' : '' }}
    {{ $attributes->class([
        'form-check-input',
        'is-invalid' => $hasErrors,
    ]) }}
/>
<label class="form-check-label" for="{{ $id }}">
    {!! $label !!}
</label>