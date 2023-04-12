<x-input :name="$name"
    {{ $attributes->class([
        'class' => 'form-control',
        'is-invalid' => ! empty($errors),
    ]) }}
    @if (! empty($errors)) aria-describedby="validation-{{ $name }}-feedback" @endif>
/>