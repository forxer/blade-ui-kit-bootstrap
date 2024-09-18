<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    type="{{ $type }}"
    form="{!! $formId !!}"
    @if ($title !== null)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $formId !!}"
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

@push('blade-ui-kit-bs-html')
    <form id="{{ $formId }}" method="{!! $formMethodValue() !!}" action="{{ $url }}" @if ($novalidate === true) novalidate="true" @endif>
        @csrf
        @method($method)
    </form>
@endpush

@if ($confirm !== null)
    <x-modal-confirm :id="'confirm-modal-'.$formId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
@endif