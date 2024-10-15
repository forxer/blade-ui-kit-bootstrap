@if ($title !== null)
    data-toggle="tooltip"
    title="{!! $title !!}"
@endif
@if ($confirm !== null)
    data-buk-confirm="{!! $confirm !!}"
    data-buk-confirm-modal="confirm-modal-{!! $confirmId !!}"
    <x-modal-confirm :id="'confirm-modal-'.$confirmId" :title="$confirmTitle" :confirmVariant="$confirmVariant" />
@endif