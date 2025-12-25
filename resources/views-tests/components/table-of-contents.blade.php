@props(['sections'])

<nav id="toc-sidebar">
    <h6 class="fw-bold text-uppercase text-muted mb-3">On this page</h6>
    <nav class="nav flex-column">
        @foreach ($sections as $section)
            <a class="nav-link" href="#{{ $section['id'] }}">{{ $section['title'] }}</a>
        @endforeach
    </nav>
</nav>
