<button
    {{ $attributes->merge([
        'class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''),
        'data-trigger' => 'focus',
        'data-placement' => 'auto',
        'data-html' => 'true',
    ]) }}
    type="button"
    data-toggle="popover"
    @if ($title !== null)
        title="{!! $title !!}"
    @endif
    data-content="{!! $content !!}">
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