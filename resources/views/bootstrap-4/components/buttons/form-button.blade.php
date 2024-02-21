<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant]) }}
    type="{{ $type }}"
    form="{!! $formId !!}"
    @if ($title !== null)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-bs-confirm="{!! $confirm !!}"
        data-bs-confirm-modal="confirm-modal-{!! $formId !!}"
        <x-modal-confirm :id="'confirm-modal-'.$formId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
    @endif
    @if ($disabled === true) disabled @endif
>
    @if ($slot->isEmpty())
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</button>

@push ('blade-ui-kit-bs-html')
    <form id="{{ $formId }}" method="{!! $formMethodValue() !!}" action="{{ $action }}" @if ($novalidate === true) novalidate="true" @endif>
        @csrf
        @method($method)
    </form>
@endpush