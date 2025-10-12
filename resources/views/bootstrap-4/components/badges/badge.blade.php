<span
    {{ $attributes->merge([
        'class' => 'badge' . ($variant !== null ? ' badge-' . $variant : '') . ($pill ? ' badge-pill' : '')
    ]) }}
>
    {!! $slot !!}
</span>
