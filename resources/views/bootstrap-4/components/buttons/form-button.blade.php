<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    type="{{ $type }}"
    form="{!! $formId !!}"
    @include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.attributes')
    @disabled($disabled)
>
@include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.content')
</button>

@push('blade-ui-kit-bs-html')
    <form id="{{ $formId }}" method="{!! $formMethodValue() !!}" action="{{ $url }}" @if ($novalidate === true) novalidate="true" @endif>
        @csrf
        @method($method)
    </form>
@endpush