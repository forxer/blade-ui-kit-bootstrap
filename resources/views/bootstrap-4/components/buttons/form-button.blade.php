<button type="submit" form="{{ $formId }}" {{ $attributes }}>
    {!! $slot !!}
</button>

@push ('button-forms')
    <form id="{{ $formId }}" method="POST" @isset($action) action="{{ $action }}" @endisset>
        @csrf
        @method($method)
    </form>
@endpush
