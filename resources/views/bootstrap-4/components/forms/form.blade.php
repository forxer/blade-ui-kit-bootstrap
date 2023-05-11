<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}"
    @isset($action) action="{{ $action }}" @endisset
    {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
    {{ $attributes }}
    @if ($novalidate) novalidate="true" @endif
>
    @csrf
    @method($method)

    {{ $slot }}
</form>
