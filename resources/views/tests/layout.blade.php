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
        .card-body > * {
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .card-body > *:last-child {
            margin-bottom: 0;
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
        pre code {
            color: #e83e8c;
            font-size: 0.875rem;
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
    </style>

    @stack('blade-ui-kit-bs-styles')
</head>
<body>
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
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.buttons')) active @endif" href="{{ route('blade-ui-kit-bs.tests.buttons') }}">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.alerts')) active @endif" href="{{ route('blade-ui-kit-bs.tests.alerts') }}">Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.badges')) active @endif" href="{{ route('blade-ui-kit-bs.tests.badges') }}">Badges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.forms')) active @endif" href="{{ route('blade-ui-kit-bs.tests.forms') }}">Forms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.inputs')) active @endif" href="{{ route('blade-ui-kit-bs.tests.inputs') }}">Inputs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('blade-ui-kit-bs.tests.modals')) active @endif" href="{{ route('blade-ui-kit-bs.tests.modals') }}">Modals</a>
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
        <h1 class="mb-4">@yield('title')</h1>
        @yield('content')
    </div>

    {{-- Back to top button --}}
    <button type="button" class="btn btn-primary back-to-top" id="backToTop" title="Retour en haut">
        <i class="bi bi-chevron-up"></i>
    </button>

    @stack('blade-ui-kit-bs-html')

    {{-- ClipboardJS for copy buttons --}}
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        });
    </script>

    @stack('blade-ui-kit-bs-scripts')
</body>
</html>
