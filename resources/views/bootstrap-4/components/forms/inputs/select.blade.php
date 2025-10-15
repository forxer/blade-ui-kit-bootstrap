<select
    name="{{ $name }}"
    id="{{ $id }}"
    @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
    {{ $attributes->class([
        'custom-select',
        'is-invalid' => $hasErrors,
    ]) }}
>
    @if ($slot->isEmpty())
        @if ($placeholder)
            <option value="" hidden>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {!! $isSelected($value) ? 'selected' : '' !!}>{{ $label }}</option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>