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
            (function () {
                // The script may be included more than once when views are delivered as
                // AJAX fragments; the delegated listener must only be registered once.
                if (window.__bukCopyListener) {
                    return;
                }
                window.__bukCopyListener = true;

                function showCopyFeedback(button, message) {
                    let originalTitle = button.getAttribute('data-original-title');

                    button.setAttribute('data-original-title', message);

                    let $button = $(button);
                    if (!$button.data('bs.tooltip')) {
                        $button.tooltip();
                    }
                    $button.tooltip('show');

                    if (originalTitle !== null) {
                        button.setAttribute('data-original-title', originalTitle);
                    }
                }

                function copySucceeded(button, text) {
                    showCopyFeedback(button, "{{ trans('blade-ui-kit-bootstrap::clipboard.success') }}");
                    button.dispatchEvent(new CustomEvent('buk-copy:success', { bubbles: true, detail: { text: text } }));
                }

                function copyFailed(button, text) {
                    showCopyFeedback(button, "{{ trans('blade-ui-kit-bootstrap::clipboard.error') }}");
                    button.dispatchEvent(new CustomEvent('buk-copy:error', { bubbles: true, detail: { text: text } }));
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
                            copyFailed(button, null);
                            return;
                        }

                        text = target.matches('input, textarea, select') ? target.value : target.textContent;
                    }

                    if (!navigator.clipboard) {
                        copyFailed(button, text);
                        return;
                    }

                    navigator.clipboard.writeText(text).then(
                        () => copySucceeded(button, text),
                        () => copyFailed(button, text)
                    );
                });
            })();
        </script>
    @endonce
@endpush
