<a
    @if ($disabled === false)
        href="{{ $url }}"
        {{ $attributes->merge(['role' => 'button', 'class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    @else
        {{ $attributes->merge(['role' => 'button', 'class' => 'disabled btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @if ($title !== null)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-bs-confirm="{!! $confirm !!}"
        data-bs-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
>
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
</a>

@if ($confirm !== null)
    <x-modal-confirm :id="'confirm-modal-'.$confirmId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
@endif