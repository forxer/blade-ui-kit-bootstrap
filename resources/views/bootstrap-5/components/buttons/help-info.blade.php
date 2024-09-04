<button
    {{ $attributes->merge([
        'class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''),
        'data-bs-trigger' => 'focus',
        'data-bs-placement' => 'auto',
        'data-bs-html' => 'true',
    ]) }}
    type="button"
    data-bs-toggle="popover"
    @if ($title !== null)
        data-bs-title="{!! $title !!}"
    @endif
    data-bs-content="{!! $content !!}"
>
    @if ($startIcon !== null)
        {!! $startIcon !!}
    @endif
    @if ($hideText)
        <span class="visually-hidden">
            {!! $text !!}
        </span>
    @else
        {!! $text !!}
    @endif
</button>