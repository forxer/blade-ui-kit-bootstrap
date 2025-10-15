<div
    {{ $attributes->merge([
        'class' => 'alert' . ($variant !== null ? ' alert-' . $variant : '') . ($dismissible ? ' alert-dismissible fade show' : ''),
        'role' => 'alert'
    ]) }}
>
    @if ($icon !== null)
        <div class="alert-icon">
            {!! $icon !!}
        </div>
    @endif

    @if ($title !== null)
        <h4 class="alert-heading">{!! $title !!}</h4>
    @endif

    {!! $slot !!}

    @if ($dismissible)
        <button type="button" class="close" data-dismiss="alert" aria-label="{!! trans('blade-ui-kit-bootstrap::alert.close') !!}">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif
</div>
