<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $hasErrors,
    ]) }}
>{{ old($name, $slot) }}</textarea>