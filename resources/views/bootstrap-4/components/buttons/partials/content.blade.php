@if ($startIcon !== null)
    {!! $startIcon !!}
@endif
@if ($startContent !== null)
    {!! $startContent !!}
@endif
@if ($slot->isEmpty())
    @if ($hideText)
        <span class="sr-only">
            {!! $text !!}
        </span>
    @else
        {!! $text !!}
    @endif
@else
    {!! $slot !!}
@endif
@if ($endContent !== null)
    {!! $endContent !!}
@endif
@if ($endIcon !== null)
    {!! $endIcon !!}
@endif