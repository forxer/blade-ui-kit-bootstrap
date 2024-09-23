@push('blade-ui-kit-bs-html')
    <div {{ $attributes->class(['modal']) }} id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $titleLabel }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <x-form action="{{ $action }}" :method="$method" :hasFiles="$hasFiles" :novalidate="$novalidate">
                    @isset ($header)
                        <div {{ $header->attributes->class(['modal-header']) }}>
                            {{ $header }}
                    @else
                        <div class="modal-header">
                            <h1 class="modal-title" id="{{ $titleLabel }}">{{ $title }}</h1>
                    @endif
                            @if ($dismissable)
                                <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('blade-ui-kit-bootstrap::modal.close') !!}">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            @endif
                        </div>
                        <div class="modal-body">
                            {!! $slot !!}
                        </div>
                    @if ($footer)
                        <div {{ $footer->attributes->class(['modal-footer']) }}>
                            {{ $footer }}
                        </div>
                    @else
                        <div class="modal-footer">
                            <div class="btn-group">
                                <x-btn-save />
                                <x-btn-cancel data-dismiss="modal" />
                            </div>
                        </div>
                    @endif
                </x-form>
            </div>
        </div>
    </div>
@endpush