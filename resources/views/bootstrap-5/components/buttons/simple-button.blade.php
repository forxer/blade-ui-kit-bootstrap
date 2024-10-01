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
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
    @disabled($disabled)
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
    @if ($endIcon !== null)
        {!! $endIcon !!}
    @endif
</button>

@if ($confirm !== null)
    <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif