<form method="{!! $formMethodValue() !!}"
    action="{{ $action }}"
    {!! $hasFiles === true ? 'enctype="multipart/form-data"' : '' !!}
    @if ($novalidate === true) novalidate @endif
    {{ $attributes }}
>
    @csrf
    @method($method)
    {!! $slot !!}
</form>