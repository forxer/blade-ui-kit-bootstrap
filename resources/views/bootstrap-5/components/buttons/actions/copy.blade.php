<button
    {{ $attributes->class([
        'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''),
        'btn-clipboard' => !$disabled,
    ]) }}
    type="{{ $type }}"
    @if ($formId !== null)
        form="{!! $formId !!}"
    @endif
    @disabled($disabled)
    @if ($target !== null)
        data-clipboard-target="{{ $target }}"
    @elseif ($string !== null)
        data-clipboard-text="{{ $string }}"
    @endif
    @if ($title !== null)
        data-bs-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
        <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
    @endif
>
@include('blade-ui-kit-bootstrap::bootstrap-5.components.buttons.partials.content')
</button>

@push('blade-ui-kit-bs-scripts')
    @once
        <script>
            window.ClipboardJS.on('success', function(e) {
                let triggerButton = e.trigger;

                let dataBsOriginalTitle = triggerButton.getAttribute("data-bs-original-title");

                triggerButton.setAttribute("data-bs-original-title", "{{ trans('blade-ui-kit-bootstrap::clipboard.success') }}");

                let bsTooltip = bootstrap.Tooltip.getInstance(triggerButton);
                bsTooltip.show();

                if (dataBsOriginalTitle !== null) {
                    triggerButton.setAttribute("data-bs-original-title", dataBsOriginalTitle);
                }

                e.clearSelection();
            });
            window.ClipboardJS.on('error', function(e) {
                let triggerButton = e.trigger;

                let dataBsOriginalTitle = triggerButton.getAttribute("data-bs-original-title");

                triggerButton.setAttribute("data-bs-original-title", "{{ trans('blade-ui-kit-bootstrap::clipboard.error') }}");

                let bsTooltip = bootstrap.Tooltip.getInstance(triggerButton);
                bsTooltip.show();

                if (dataBsOriginalTitle !== null) {
                    triggerButton.setAttribute("data-bs-original-title", dataBsOriginalTitle);
                }

                e.clearSelection();
            });
        </script>
    @endonce
@endpush