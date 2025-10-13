<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Blade UI Kit Bootstrap Tests</title>

    @if(config('blade-ui-kit-bootstrap.bootstrap_version') === \BladeUIKitBootstrap\Enums\BootstrapVersion::V5)
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @endif

    <style>
        .code-example {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .code-example pre {
            margin-bottom: 0;
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 0.75rem;
            border-radius: 0.25rem;
        }
        .code-example code {
            color: #e83e8c;
        }
        .example-section {
            margin-bottom: 3rem;
        }
        .example-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #dee2e6;
        }
        .demo-block {
            padding: 1.5rem;
            margin-bottom: 1rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
        .demo-block > * {
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
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
                            Bootstrap {{ config('blade-ui-kit-bootstrap.bootstrap_version')->value }}
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

    @stack('blade-ui-kit-bs-html')

    {{-- ClipboardJS for copy buttons --}}
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>

    @if(config('blade-ui-kit-bootstrap.bootstrap_version') === \BladeUIKitBootstrap\Enums\BootstrapVersion::V5)
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Initialize Bootstrap popovers for help-info buttons
            document.addEventListener('DOMContentLoaded', function () {
                const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
                [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
            });
        </script>
    @else
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Initialize Bootstrap popovers for help-info buttons
            $(document).ready(function() {
                $('[data-toggle="popover"]').popover();
            });
        </script>
    @endif

    @stack('blade-ui-kit-bs-scripts')
</body>
</html>
