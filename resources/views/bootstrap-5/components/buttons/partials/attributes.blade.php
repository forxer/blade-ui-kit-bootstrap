@if ($title !== null)
    data-bs-toggle="tooltip"
    title="{!! $title !!}"
@endif
@if ($confirm !== null)
    data-buk-confirm="{!! $confirm !!}"
    data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    <x-confirm-modal :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif