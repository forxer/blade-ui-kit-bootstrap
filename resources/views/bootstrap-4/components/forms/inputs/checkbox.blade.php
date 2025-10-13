<div {{ $attributes->class(['custom-control', 'custom-checkbox']) }}>
    <input
        name="{{ $name }}"
        type="checkbox"
        id="{{ $id }}"
        value="{{ $value }}"
        @if($isChecked)checked@endif
        @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
        class="custom-control-input @if($hasErrors) is-invalid @endif"
    />
    <label class="custom-control-label" for="{{ $id }}">
        {!! $label !!}
    </label>
</div>
