<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant, 'type' => 'button']) }}
    @if ($title)
        data-bs-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($disabled === true) disabled @endif
>
    @if ($slot->isEmpty())
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</button>
