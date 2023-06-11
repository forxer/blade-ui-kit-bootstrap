<button type="submit" form="{{ $formId }}" {{ $attributes }}>
    {{ $slot->isEmpty() ? __('Log out') : $slot }}
</button>

@push ('button-forms')
    <form id="{{ $formId }}" method="POST" @isset($action) action="{{ $action }}" @endisset>
        @csrf
    </form>
@endpush
