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
        data-toggle="tooltip"
        title="{!! $title !!}"
    @endif
    @if ($confirm !== null)
        data-buk-confirm="{!! $confirm !!}"
        data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    @endif
>
@include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.content')
</button>
@if ($confirm !== null)
    <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif
@push('blade-ui-kit-bs-scripts')
    @once
        <script>
            $(document).ready(function() {
                const clipboard = new ClipboardJS('.btn-clipboard');

                clipboard.on('success', function(e) {
                    let triggerButton = e.trigger;

                    let dataBsOriginalTitle = triggerButton.getAttribute("data-original-title");

                    triggerButton.setAttribute("data-original-title", "{{ trans('blade-ui-kit-bootstrap::clipboard.success') }}");

                    let $bsTooltip = $(triggerButton);
                    if (!$bsTooltip.data('bs.tooltip')) {
                        $bsTooltip.tooltip();
                    }
                    $bsTooltip.tooltip('show');

                    if (dataBsOriginalTitle !== null) {
                        triggerButton.setAttribute("data-original-title", dataBsOriginalTitle);
                    }

                    e.clearSelection();
                });

                clipboard.on('error', function(e) {
                    let triggerButton = e.trigger;

                    let dataBsOriginalTitle = triggerButton.getAttribute("data-original-title");

                    triggerButton.setAttribute("data-original-title", "{{ trans('blade-ui-kit-bootstrap::clipboard.error') }}");

                    let $bsTooltip = $(triggerButton);
                    if (!$bsTooltip.data('bs.tooltip')) {
                        $bsTooltip.tooltip();
                    }
                    $bsTooltip.tooltip('show');

                    if (dataBsOriginalTitle !== null) {
                        triggerButton.setAttribute("data-original-title", dataBsOriginalTitle);
                    }

                    e.clearSelection();
                });
            });
        </script>
    @endonce
@endpush