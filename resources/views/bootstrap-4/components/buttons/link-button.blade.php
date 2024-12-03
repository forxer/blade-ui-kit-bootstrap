<a
    @if ($disabled === false)
        @if ($url !== null)
            href="{{ $url }}"
        @endif
        {{ $attributes->merge(['role' => 'button', 'class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    @else
        {{ $attributes->merge(['role' => 'button', 'class' => 'disabled btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @if ($title !== null)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
        <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
    @endif
>
@include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.content')
</a>