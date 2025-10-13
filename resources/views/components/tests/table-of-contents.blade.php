@props(['sections'])

{{--
    Composant pour afficher une table des matières collapsible (Bootstrap 5 only)

    Usage:
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-simple-button', 'title' => 'Simple Button'],
        ['id' => 'section-form-button', 'title' => 'Form Button'],
    ]" />
--}}

<div class="card mb-4">
    <div class="card-header">
        <button class="btn btn-link text-decoration-none p-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#toc" aria-expanded="true">
            <i class="bi bi-list"></i> Table des matières
        </button>
    </div>
    <div class="collapse show" id="toc">
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($sections as $section)
                    <li class="mb-1">
                        <a href="#{{ $section['id'] }}" class="text-decoration-none">
                            {{ $section['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
