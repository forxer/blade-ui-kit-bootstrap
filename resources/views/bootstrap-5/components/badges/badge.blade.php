<span
    {{ $attributes->merge([
        'class' => 'badge' . ($variant !== null ? ' text-bg-' . $variant : '') . ($pill ? ' rounded-pill' : '')
    ]) }}
>
    {!! $slot !!}
</span>
