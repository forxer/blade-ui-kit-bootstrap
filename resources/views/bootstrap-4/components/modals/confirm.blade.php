<x-modal :id="e($id)" :title="e($title)" :dismissable="false" :variant="$confirmVariant" class="fade" data-backdrop="static" data-keyboard="false">
    <x-slot:footer>
        <div class="btn-group" role="group">
            <x-btn-confirm-modal-yes data-buk-confirm-trigger="yes" />
            <x-btn-confirm-modal-no data-dismiss="modal" />
        </div>
    </x-slot>
</x-modal>
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

                        let confirmModal = document.getElementById(element.dataset.bukConfirmModal);

                        confirmModal.querySelector('.modal-body').innerHTML = '<p>'+element.dataset.bukConfirm+'</p>';

                        $(confirmModal).modal().show();

                        confirmModal.querySelector('[data-buk-confirm-trigger="yes"]').addEventListener('click', () => {
                            element.dataset.confirmed = 1;
                            element.click();
                        });
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                askConfirm('[data-buk-confirm]');
            });
        </script>
    @endonce
@endpush