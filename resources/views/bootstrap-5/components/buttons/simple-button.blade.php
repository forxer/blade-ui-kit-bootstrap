<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    type="{{ $type }}"
    @if ($formId !== null)
        form="{!! $formId !!}"
    @endif
    @if ($title !== null)
        data-bs-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-bs-confirm="{!! $confirm !!}"
        data-bs-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
    @disabled($disabled)
>
    @if ($startContent !== null)
        {!! $startContent !!}
    @endif
    @if ($slot->isEmpty())
        @if ($hideText)
            <span class="visually-hidden">
                {!! $text !!}
            </span>
        @else
            <span class="d-none d-lg-inline">
                {!! $text !!}
            </span>
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