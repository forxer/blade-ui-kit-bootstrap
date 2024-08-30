@push('blade-ui-kit-bs-html')
    <div {{ $attributes->class(['modal']) }} id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $titleLabel }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    @isset ($header)
                        <div {{ $header->attributes->class(['modal-header']) }}>
                            {{ $header }}
                    @else
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{ $titleLabel }}">{{ $title }}</h5>
                    @endif
                        @if ($dismissable)
                            <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('blade-ui-kit-bootstrap::modal.close') !!}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        @endif
                    </div>
                <div class="modal-body">
                    {!! $slot !!}
                </div>
                @if ($footer)
                    <div {{ $footer->attributes->class(['modal-footer']) }}>
                        {{ $footer }}
                    </div>
                @else
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-confirm-trigger="yes">{!! trans('blade-ui-kit-bootstrap::modal.yes') !!}</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">{!! trans('blade-ui-kit-bootstrap::modal.no') !!}</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endpush
@push('blade-ui-kit-bs-scripts')
    @once
        <script>
            function askConfirm(selector) {
                document.querySelectorAll(selector).forEach((element) => {
                    element.addEventListener('click', (event) => {
                        if ('confirmed' in element.dataset) {
                            return true;
                        }

                        event.preventDefault(element.dataset);

                        let confirmModal = document.getElementById(element.dataset.bsConfirmModal);

                        confirmModal.querySelector('.modal-body').innerHTML = '<p>'+element.dataset.bsConfirm+'</p>';

                        $(confirmModal).modal().show();

                        confirmModal.querySelector('[data-confirm-trigger="yes"]').addEventListener('click', () => {
                            element.dataset.confirmed = 1;
                            element.click();
                        });
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                askConfirm('[data-bs-confirm]');
            });
        </script>
    @endonce
@endpush