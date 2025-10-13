@props(['id', 'code' => null])

{{--
    Composant pour afficher une démo avec son code dans un collapse (Bootstrap 5 only)

    Usage:
    <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-example-1">
        <x-btn variant="primary">Demo Button</x-btn>

        <x-slot:code>
&lt;x-btn variant="primary"&gt;Demo Button&lt;/x-btn&gt;
        </x-slot:code>
    </x-blade-ui-kit-bootstrap::tests.demo-with-code>
--}}

<div class="card mb-3">
    <div class="card-body">
        <div class="demo-preview">
            {{ $slot }}
        </div>
    </div>

    @if($code)
    <div class="card-footer bg-white border-top text-end">
        <button class="btn btn-sm btn-outline-secondary" type="button"
                data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-expanded="false">
            <i class="bi bi-code-slash"></i> Voir le code
        </button>
    </div>

    <div class="collapse" id="{{ $id }}">
        <div class="card-body border-top bg-light">
            <pre class="mb-0"><code>{!! $code !!}</code></pre>
        </div>
    </div>
    @endif
</div>
