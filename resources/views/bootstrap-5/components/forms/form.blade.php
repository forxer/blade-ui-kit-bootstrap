<form method="{!! $formMethodValue() !!}"
    action="{{ $action }}"
    {!! $hasFiles === true ? 'enctype="multipart/form-data"' : '' !!}
    @if ($novalidate === true) novalidate="true" @endif
    {{ $attributes }}
>
    @csrf
    @method($method)
    {!! $slot !!}
</form>