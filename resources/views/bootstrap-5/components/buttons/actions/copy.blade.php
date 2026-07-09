<button
    {{ $attributes->class([
        'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''),
    ]) }}
    type="{{ $type }}"
    @if ($formId !== null)
        form="{!! $formId !!}"
    @endif
    @disabled($disabled)
    @if ($target !== null)
        data-buk-copy-target="{{ $target }}"
    @elseif ($string !== null)
        data-buk-copy-text="{{ $string }}"
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
</button>
@if ($confirm !== null)
    <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif
@push('blade-ui-kit-bs-scripts')
    @once
        <script>
            (function () {
                function showCopyFeedback(button, message) {
                    let originalTitle = button.getAttribute('data-bs-original-title');

                    button.setAttribute('data-bs-original-title', message);

                    let tooltip = bootstrap.Tooltip.getInstance(button);
                    if (!tooltip) {
                        tooltip = new bootstrap.Tooltip(button);
                    }
                    tooltip.show();

                    if (originalTitle !== null) {
                        button.setAttribute('data-bs-original-title', originalTitle);
                    }
                }

                document.addEventListener('click', function (event) {
                    if (event.defaultPrevented) {
                        return;
                    }

                    const button = event.target.closest('[data-buk-copy-text], [data-buk-copy-target]');

                    if (button === null) {
                        return;
                    }

                    let text = button.getAttribute('data-buk-copy-text');

                    if (text === null) {
                        const target = document.querySelector(button.getAttribute('data-buk-copy-target'));

                        if (target === null) {
                            showCopyFeedback(button, "{{ trans('blade-ui-kit-bootstrap::clipboard.error') }}");
                            return;
                        }

                        text = target.matches('input, textarea, select') ? target.value : target.textContent;
                    }

                    if (!navigator.clipboard) {
                        showCopyFeedback(button, "{{ trans('blade-ui-kit-bootstrap::clipboard.error') }}");
                        return;
                    }

                    navigator.clipboard.writeText(text).then(
                        () => showCopyFeedback(button, "{{ trans('blade-ui-kit-bootstrap::clipboard.success') }}"),
                        () => showCopyFeedback(button, "{{ trans('blade-ui-kit-bootstrap::clipboard.error') }}")
                    );
                });
            })();
        </script>
    @endonce
@endpush
