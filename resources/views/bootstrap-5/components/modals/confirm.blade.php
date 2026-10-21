<x-modal :id="$id" :title="$title" :dismissable="false" class="fade" data-bs-backdrop="static" data-bs-keyboard="false">
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

                        let body = confirmModal.querySelector('.modal-body');

                        // The button components flag their message as HTML (data-buk-confirm-html);
                        // a hand-written data-buk-confirm attribute is plain text.
                        if ('bukConfirmHtml' in element.dataset) {
                            body.innerHTML = '<p>'+element.dataset.bukConfirm+'</p>';
                        } else {
                            let message = document.createElement('p');
                            message.textContent = element.dataset.bukConfirm;
                            body.replaceChildren(message);
                        }

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