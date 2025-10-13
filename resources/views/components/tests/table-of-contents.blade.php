@props(['sections'])

{{--
    Composant pour afficher une table des matières sticky avec scrollspy (Bootstrap 5 only)

    Usage:
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-simple-button', 'title' => 'Simple Button'],
        ['id' => 'section-form-button', 'title' => 'Form Button'],
    ]" />
--}}

<nav id="toc-sidebar" class="navbar flex-column align-items-stretch">
    <div class="mb-2">
        <h6 class="text-muted">
            <i class="bi bi-list"></i> Table of contents
        </h6>
    </div>
    <nav class="nav nav-pills flex-column">
        @foreach($sections as $section)
            <a class="nav-link" href="#{{ $section['id'] }}">
                {{ $section['title'] }}
            </a>
        @endforeach
    </nav>
</nav>
