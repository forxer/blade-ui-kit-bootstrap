<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant]) }}
    type="{{ $type }}"
    @if ($formId !== null)
        form="{!! $formId !!}"
    @endif
    @if ($title !== null)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-bs-confirm="{!! $confirm !!}"
        data-bs-confirm-modal="confirm-modal-{!! $confirmId !!}"
        <x-modal-confirm :id="'confirm-modal-'.$confirmId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
    @endif
    @if ($disabled === true) disabled @endif
>
    @if ($slot->isEmpty())
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</button>
