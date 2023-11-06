<a
    @if ($disabled === false)
        href="{{ $url }}"
        {{ $attributes->class(['btn'])->merge(['role' => 'button']) }}
    @else
        {{ $attributes->class(['btn', 'disabled'])->merge(['role' => 'button', 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @if ($title)
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-confirm="{!! $confirm !!}"
        data-confirm-modal="confirm-modal-{!! $formId !!}"
        <x-modal-confirm :id="'confirm-modal-'.$formId" :title="trans('blade-ui-kit-bootstrap::modal.confirm')" />
    @endif
>{!! $slot !!}</a>