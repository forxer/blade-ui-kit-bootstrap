<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Blade UI Kit Bootstrap Tests</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .example-section {
            margin-bottom: 3rem;
            scroll-margin-top: 80px;
        }
        .example-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #dee2e6;
        }
        .example-section h5 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #495057;
            font-weight: 600;
        }
        .back-to-top {
            position: fixed;
            bottom: 3rem;
            right: 2rem;
            display: none;
            z-index: 1000;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }
        /* Shiki code blocks styling */
        .shiki {
            margin: 0;
            padding: 1rem;
            border-radius: 0;
            font-size: 0.875rem;
            overflow-x: auto;
        }
        /* Fix card border radius when collapse is used */
        .card > .card-footer {
            border-bottom-left-radius: calc(0.375rem - 1px) !important;
            border-bottom-right-radius: calc(0.375rem - 1px) !important;
        }
        .card > .collapse.show:last-child {
            border-bottom-left-radius: inherit;
            border-bottom-right-radius: inherit;
            overflow: hidden;
        }
        /* Sticky sidebar TOC */
        #toc-sidebar {
            position: sticky;
            top: 80px;
            max-height: calc(100vh - 100px);
            overflow-y: auto;
        }
        #toc-sidebar .nav-link {
            color: #6c757d;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        #toc-sidebar .nav-link:hover {
            color: #0d6efd;
        }
        #toc-sidebar .nav-link.active {
            color: #0d6efd;
            font-weight: 600;
            border-left: 2px solid #0d6efd;
        }
    </style>

    @stack('blade-ui-kit-bs-styles')
</head>
<body data-bs-spy="scroll" data-bs-target="#toc-sidebar" data-bs-offset="100" data-bs-smooth-scroll="true">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blade-ui-kit-bs.tests.index') }}">Blade UI Kit Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.index')) active @endif" href="{{ route('blade-ui-kit-bs.tests.index') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->routeIs('blade-ui-kit-bs.tests.buttons-*')) active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Buttons
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.buttons-components')) active @endif" href="{{ route('blade-ui-kit-bs.tests.buttons-components') }}">Components</a></li>
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.buttons-actions')) active @endif" href="{{ route('blade-ui-kit-bs.tests.buttons-actions') }}">Actions</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.alerts')) active @endif" href="{{ route('blade-ui-kit-bs.tests.alerts') }}">Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.badges')) active @endif" href="{{ route('blade-ui-kit-bs.tests.badges') }}">Badges</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->routeIs('blade-ui-kit-bs.tests.forms-*')) active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Forms
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.forms-basics')) active @endif" href="{{ route('blade-ui-kit-bs.tests.forms-basics') }}">Basics</a></li>
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.forms-components')) active @endif" href="{{ route('blade-ui-kit-bs.tests.forms-components') }}">Components</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->routeIs('blade-ui-kit-bs.tests.inputs-*')) active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inputs
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.inputs-text')) active @endif" href="{{ route('blade-ui-kit-bs.tests.inputs-text') }}">Text</a></li>
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.inputs-advanced')) active @endif" href="{{ route('blade-ui-kit-bs.tests.inputs-advanced') }}">Advanced</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->routeIs('blade-ui-kit-bs.tests.modals-*')) active @endif" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Modals
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.modals-types')) active @endif" href="{{ route('blade-ui-kit-bs.tests.modals-types') }}">Types</a></li>
                            <li><a class="dropdown-item @if(request()->routeIs('blade-ui-kit-bs.tests.modals-variations')) active @endif" href="{{ route('blade-ui-kit-bs.tests.modals-variations') }}">Variations</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="navbar-text">
                            Bootstrap 5
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="mb-4">@yield('title')</h1>
                @yield('content')
            </div>
            <div class="col-lg-3">
                @yield('sidebar')
            </div>
        </div>
    </div>

    {{-- Back to top button --}}
    <button type="button" class="btn btn-primary back-to-top" id="backToTop" title="Retour en haut">
        <i class="bi bi-chevron-up"></i>
    </button>

    @stack('blade-ui-kit-bs-html')

    {{-- ClipboardJS for copy buttons --}}
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Shiki for syntax highlighting --}}
    <script type="module">
        import { codeToHtml } from 'https://esm.sh/shiki@1.22.2'

        document.addEventListener('DOMContentLoaded', async function () {
            // Find all code blocks that need highlighting
            const codeBlocks = document.querySelectorAll('code.language-markup');

            for (const codeBlock of codeBlocks) {
                const code = codeBlock.textContent;
                const parent = codeBlock.parentElement;

                try {
                    // Highlight with Shiki using blade language
                    const html = await codeToHtml(code, {
                        lang: 'blade',
                        theme: 'github-dark'
                    });

                    // Replace pre+code with Shiki output
                    parent.outerHTML = html;
                } catch (error) {
                    console.error('Shiki highlighting error:', error);
                }
            }
        });
    </script>
    <script>
        // Initialize Bootstrap popovers for help-info buttons
        document.addEventListener('DOMContentLoaded', function () {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));

            // Back to top button
            const backToTopBtn = document.getElementById('backToTop');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopBtn.style.display = 'block';
                } else {
                    backToTopBtn.style.display = 'none';
                }
            });
            backToTopBtn?.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Initialize ClipboardJS for copy buttons
            const clipboard = new ClipboardJS('.copy-btn');

            clipboard.on('success', function(e) {
                const button = e.trigger;
                const icon = button.querySelector('i');
                const text = button.querySelector('.copy-text');

                // Change icon and text to show success
                icon.classList.remove('bi-clipboard');
                icon.classList.add('bi-clipboard-check');
                text.textContent = 'Copié !';

                // Reset after 2 seconds
                setTimeout(() => {
                    icon.classList.remove('bi-clipboard-check');
                    icon.classList.add('bi-clipboard');
                    text.textContent = 'Copier';
                }, 2000);

                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                console.error('Copy failed:', e);
            });

            // Handle code collapse toggle for all code blocks
            const collapseElements = document.querySelectorAll('.collapse');
            collapseElements.forEach(collapse => {
                const codeId = collapse.id;
                const toggleBtn = document.querySelector(`[data-code-id="${codeId}"].toggle-code-btn`);
                const copyBtn = document.querySelector(`[data-code-id="${codeId}"].copy-btn`);

                // Listen for collapse show event
                collapse.addEventListener('show.bs.collapse', function () {
                    if (toggleBtn) {
                        const icon = toggleBtn.querySelector('i');
                        const text = toggleBtn.querySelector('.toggle-text');
                        icon.classList.remove('bi-code-slash');
                        icon.classList.add('bi-eye-slash');
                        text.textContent = 'Masquer le code';
                    }
                    if (copyBtn) {
                        copyBtn.classList.remove('d-none');
                    }
                });

                // Listen for collapse hide event
                collapse.addEventListener('hide.bs.collapse', function () {
                    if (toggleBtn) {
                        const icon = toggleBtn.querySelector('i');
                        const text = toggleBtn.querySelector('.toggle-text');
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-code-slash');
                        text.textContent = 'Voir le code';
                    }
                    if (copyBtn) {
                        copyBtn.classList.add('d-none');
                    }
                });
            });
        });
    </script>

    @stack('blade-ui-kit-bs-scripts')
</body>
</html>
