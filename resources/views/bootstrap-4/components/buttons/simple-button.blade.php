<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    type="{{ $type }}"
    @if ($formId !== null)
        form="{!! $formId !!}"
    @endif
    @if ($title !== null)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
    @disabled($disabled)
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
</button>

@if ($confirm !== null)
    <x-modal-confirm :id="'confirm-modal-'.$confirmId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
@endif