<select
    name="{{ $name }}"
    id="{{ $id }}"
    @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
    {{ $attributes->class([
        'form-select',
        'is-invalid' => $hasErrors,
    ]) }}
>
    @if ($slot->isEmpty())
        @if ($placeholder)
            <option value="" hidden>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $label)
            @if (is_array($label))
                <optgroup label="{{ $value }}">
                    @foreach ($label as $optionValue => $optionLabel)
                        <option value="{{ $optionValue }}" {!! $isSelected($optionValue) ? 'selected' : '' !!}>{{ $optionLabel }}</option>
                    @endforeach
                </optgroup>
            @else
                <option value="{{ $value }}" {!! $isSelected($value) ? 'selected' : '' !!}>{{ $label }}</option>
            @endif
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>