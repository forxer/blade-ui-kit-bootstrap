@push('blade-ui-kit-bs-html')
    <div {{ $attributes->class(['modal']) }} id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $titleLabel }}" aria-hidden="true">
        <div @class([
            'modal-dialog',
            'modal-sm' => $size === 'sm',
            'modal-lg' => $size === 'lg',
            'modal-xl' => $size === 'xl',
            'modal-dialog-centered' => $centered,
            'modal-dialog-scrollable' => $scrollable,
        ])>
            <div class="modal-content">
                <x-form action="{{ $action }}" :method="$method" :hasFiles="$hasFiles" :novalidate="$novalidate">
                    @isset ($header)
                        <div {{ $header->attributes->class(['modal-header']) }}>
                            {{ $header }}
                            @if ($dismissable)
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{!! trans('blade-ui-kit-bootstrap::modal.close') !!}"></button>
                            @endif
                        </div>
                    @else
                        <div class="modal-header">
                            <h1 class="modal-title" id="{{ $titleLabel }}">{{ $title }}</h1>
                            @if ($dismissable)
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{!! trans('blade-ui-kit-bootstrap::modal.close') !!}"></button>
                            @endif
                        </div>
                    @endisset
                        <div class="modal-body">
                            {!! $slot !!}
                        </div>
                    @if ($footer)
                        <div {{ $footer->attributes->class(['modal-footer']) }}>
                            {{ $footer }}
                        </div>
                    @else
                        <div class="modal-footer">
                            <div class="btn-group" role="group">
                                <x-btn-cancel data-bs-dismiss="modal" />
                                <x-btn-save />
                            </div>
                        </div>
                    @endif
                </x-form>
            </div>
        </div>
    </div>
@endpush