<div {{ $attributes->class(['form-check']) }}>
    <input
        name="{{ $name }}"
        type="checkbox"
        id="{{ $id }}"
        value="{{ $value }}"
        @if($isChecked)checked@endif
        @if($hasErrors)aria-describedby="validation-{{ $name }}-feedback"@endif
        class="form-check-input @if($hasErrors) is-invalid @endif"
    />
    <label class="form-check-label" for="{{ $id }}">
        {!! $label !!}
    </label>
</div>
