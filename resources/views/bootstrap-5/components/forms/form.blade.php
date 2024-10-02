<form method="{!! $formMethodValue() !!}" action="{{ $action }}"
    @if ($hasFiles) enctype="multipart/form-data" @endif
    @if ($novalidate === true) novalidate @endif
    {{ $attributes }}
>
    @if ($method !== 'GET')
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif
    @endif
    {!! $slot !!}
</form>