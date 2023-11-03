@push ('blade-ui-kit-bs-html')
    <div {{ $attributes->class(['modal']) }} id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $titleLabel }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    @isset ($header)
                        <div {{ $header->attributes->class(['modal-header']) }}>
                            {{ $header }}
                    @else
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{ $titleLabel }}">{{ $title }}</h5>
                    @endif
                        @if ($dismissable)
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{!! trans('blade-ui-kit-bootstrap::modal.close') !!}"></button>
                        @endif
                    </div>
                <div class="modal-body">
                    {!! $slot !!}
                </div>
                @if ($footer)
                    <div {{ $footer->attributes->class(['modal-footer']) }}>
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endpush
