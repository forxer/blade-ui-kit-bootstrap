<a
    @if ($disabled === false)
        @if ($url !== null)
            href="{{ $url }}"
        @endif
        {{ $attributes->merge(['role' => 'button', 'class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    @else
        {{ $attributes->merge(['role' => 'button', 'class' => 'disabled btn btn-'.$variant.($size !== null ? ' btn-'.$size : ''), 'aria-disabled' => 'true', 'tabindex' => '-1']) }}
    @endif
    @include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.attributes')
>
@include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.content')
</a>