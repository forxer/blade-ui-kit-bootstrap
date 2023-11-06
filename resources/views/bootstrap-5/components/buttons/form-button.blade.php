<button
    {{ $attributes->class(['btn'])->merge(['type' => 'submit']) }}
    form="{!! $formId !!}"
    @if ($title)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-confirm="{!! $confirm !!}"
        data-confirm-modal="confirm-modal-{!! $formId !!}"
        <x-modal-confirm :id="'confirm-modal-'.$formId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
    @endif
    @if ($disabled === true) disabled @endif
>{!! $slot !!}</button>

@push ('blade-ui-kit-bs-html')
    <form id="{{ $formId }}" method="{!! $formMethodValue() !!}" action="{{ $action }}" @if ($novalidate === true) novalidate="true" @endif>
        @csrf
        @method($method)
    </form>
@endpush