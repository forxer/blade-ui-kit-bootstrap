<x-modal :id="e($id)" :title="e($title)" :dismissable="false" :variant="$confirmVariant" class="fade" data-bs-backdrop="static" data-bs-keyboard="false">
    <x-slot:footer>
        <div class="btn-group" role="group">
            <x-btn-confirm-modal-no data-bs-dismiss="modal" />
            <x-btn-confirm-modal-yes data-buk-confirm-trigger="yes" />
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

                        event.preventDefault();

                        let confirmModal = document.getElementById(element.dataset.bukConfirmModal);

                        confirmModal.querySelector('.modal-body').innerHTML = '<p>'+element.dataset.bukConfirm+'</p>';

                        new bootstrap.Modal(confirmModal).show();

                        confirmModal.querySelector('[data-buk-confirm-trigger="yes"]').addEventListener('click', () => {
                            element.dataset.confirmed = 1;
                            element.click();
                        });
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', () => {
                askConfirm('[data-buk-confirm]');
            });
        </script>
    @endonce
@endpush