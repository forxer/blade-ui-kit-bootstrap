<input
    name="{{ $name }}"
    type="date"
    id="{{ $id }}"
    @if($value)value="{{ $value }}"@endif
    @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $hasErrors,
    ]) }}
/>