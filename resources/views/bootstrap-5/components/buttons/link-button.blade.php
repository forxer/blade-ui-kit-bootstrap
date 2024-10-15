<a
    @if ($disabled === false)
        @if ($url !== null)
            href="{{ $url }}"
        @endif
        {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'role' => 'button']) }}
    @else
        {{ $attributes->merge(['class' => 'disabled btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'role' => 'button', 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @include('blade-ui-kit-bootstrap::bootstrap-5.components.buttons.partials.attributes')
>
@include('blade-ui-kit-bootstrap::bootstrap-5.components.buttons.partials.content')
</a>