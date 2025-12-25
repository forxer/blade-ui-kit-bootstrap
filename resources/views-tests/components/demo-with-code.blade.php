@props(['id'])

<div class="card mb-3">
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="card-footer bg-white border-top-0 d-flex gap-2">
        <button class="btn btn-sm btn-outline-secondary toggle-code-btn" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-expanded="false" aria-controls="{{ $id }}" data-code-id="{{ $id }}">
            <i class="bi bi-code-slash me-1"></i><span class="toggle-text">View code</span>
        </button>
        <button class="btn btn-sm btn-outline-secondary copy-btn d-none" type="button" data-clipboard-target="#{{ $id }} code" data-code-id="{{ $id }}">
            <i class="bi bi-clipboard me-1"></i><span class="copy-text">Copy</span>
        </button>
    </div>
    <div class="collapse" id="{{ $id }}">
        <pre class="m-0 bg-dark"><code class="language-markup">{{ $code }}</code></pre>
    </div>
</div>
