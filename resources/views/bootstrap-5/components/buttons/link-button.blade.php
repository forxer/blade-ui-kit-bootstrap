<a
    @if ($disabled === false)
        @if ($url !== null)
            href="{{ $url }}"
        @endif
        {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'role' => 'button']) }}
    @else
        {{ $attributes->merge(['class' => 'disabled btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'role' => 'button', 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @if ($title !== null)
        data-bs-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
>
@include('blade-ui-kit-bootstrap::bootstrap-5.components.buttons.partials.content')
</a>
@if ($confirm !== null)
    <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif