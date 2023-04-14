
<input
    name="{{ $name }}"
    type="email"
    id="{{ $id }}"
    @if($value)value="{{ $value }}"@endif
    @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $hasErrors,
    ]) }}
/>