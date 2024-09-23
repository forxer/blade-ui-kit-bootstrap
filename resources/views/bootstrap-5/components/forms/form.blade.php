<form method="{!! $formMethodValue() !!}" action="{{ $action }}"
    @if ($hasFiles) enctype="multipart/form-data" @endif
    @if ($novalidate === true) novalidate @endif
    {{ $attributes }}
>
    @csrf
    @method($method)
    {!! $slot !!}
</form>