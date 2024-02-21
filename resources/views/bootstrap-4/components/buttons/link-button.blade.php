<a
    @if ($disabled === false)
        href="{{ $url }}"
        {{ $attributes->merge(['role' => 'button', 'class' => 'btn btn-'.$variant]) }}
    @else
        {{ $attributes->merge(['role' => 'button', 'class' => 'disabled btn btn-'.$variant, 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
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
>
    @if ($slot->isEmpty())
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</a>