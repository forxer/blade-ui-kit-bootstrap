<button
    {{ $attributes->merge(['class' => 'btn btn-'.$variant.($size !== null ? ' btn-'.$size : '')]) }}
    type="{{ $type }}"
    @if ($formId !== null)
        form="{!! $formId !!}"
    @endif
    @include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.attributes')
    @disabled($disabled)
>
@include('blade-ui-kit-bootstrap::bootstrap-4.components.buttons.partials.content')
</button>