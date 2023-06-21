<button type="submit" form="{{ $formId }}" {{ $attributes }}>
    {!! $slot !!}
</button>

@push ('blade-ui-kit-bs-html')
    <form id="{{ $formId }}" method="POST" @isset($action) action="{{ $action }}" @endisset>
        @csrf
        @method($method)
    </form>
@endpush
