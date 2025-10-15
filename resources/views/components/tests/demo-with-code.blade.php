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
    <div class="card-footer bg-white border-top">
        <div class="d-flex justify-content-end align-items-center gap-2">
            <button class="btn btn-sm btn-outline-secondary copy-btn d-none" type="button"
                    data-clipboard-text="{{ html_entity_decode($code, ENT_QUOTES, 'UTF-8') }}"
                    data-code-id="{{ $id }}">
                <i class="bi bi-clipboard"></i> <span class="copy-text">Copy</span>
            </button>
            <button class="btn btn-sm btn-outline-secondary toggle-code-btn" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-expanded="false"
                    data-code-id="{{ $id }}">
                <i class="bi bi-code-slash"></i> <span class="toggle-text">View code</span>
            </button>
        </div>
    </div>

    <div class="collapse" id="{{ $id }}">
        <div class="card-body border-top bg-light">
            <pre class="mb-0"><code class="language-markup">{!! $code !!}</code></pre>
        </div>
    </div>
    @endif
</div>
