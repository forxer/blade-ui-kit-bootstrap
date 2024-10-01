<a
    @if ($disabled === false)
        href="{{ $url }}"
        {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'role' => 'button']) }}
    @else
        {{ $attributes->merge(['class' => 'disabled btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'role' => 'button', 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @if ($title !== null)
        data-bs-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
>
    @if ($startIcon !== null)
        {!! $startIcon !!}
    @endif
    @if ($startContent !== null)
        {!! $startContent !!}
    @endif
    @if ($slot->isEmpty())
        @if ($hideText)
            <span class="visually-hidden">
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
</a>

@if ($confirm !== null)
    <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif