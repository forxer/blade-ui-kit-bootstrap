@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Component Tests')

@section('content')
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Welcome to Blade UI Kit Bootstrap Test Pages!</h4>
        <p>
            These pages demonstrate all the available components with their various configurations
            and Bootstrap {{ config('blade-ui-kit-bootstrap.bootstrap_version')->value }} styling.
        </p>
        <hr>
        <p class="mb-2">
            Select a category from the navigation above to explore the components.
        </p>
        <p class="mb-0">
            <i class="bi bi-book"></i>
            For detailed documentation, installation guides, and usage examples, visit the
            <a href="https://github.com/forxer/blade-ui-kit-bootstrap/blob/main/docs/testing-pages.md" target="_blank" class="alert-link">
                Testing Pages Documentation <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </p>
    </div>

    <h3 class="mt-4 mb-3">Buttons</h3>
    <div class="list-group mb-4">
        <a href="{{ route('blade-ui-kit-bs.tests.buttons-components') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Button Components</h5>
                <span class="badge bg-primary rounded-pill">4 components</span>
            </div>
            <p class="mb-1">Simple buttons, form buttons, link buttons, and help info</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.buttons-actions') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Action Buttons</h5>
                <span class="badge bg-primary rounded-pill">23 components</span>
            </div>
            <p class="mb-1">Pre-configured action buttons: CRUD, navigation, archive, status, and more</p>
        </a>
    </div>

    <h3 class="mb-3">Other Components</h3>
    <div class="list-group mb-4">
        <a href="{{ route('blade-ui-kit-bs.tests.alerts') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Alerts</h5>
                <span class="badge bg-primary rounded-pill">1 component</span>
            </div>
            <p class="mb-1">Alert component with dismissible, title, and icon support</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.badges') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Badges</h5>
                <span class="badge bg-primary rounded-pill">1 component</span>
            </div>
            <p class="mb-1">Badge component with pill style support</p>
        </a>
    </div>

    <h3 class="mb-3">Forms</h3>
    <div class="list-group mb-4">
        <a href="{{ route('blade-ui-kit-bs.tests.forms-basics') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Form Basics</h5>
                <span class="badge bg-primary rounded-pill">1 component</span>
            </div>
            <p class="mb-1">Form wrapper with CSRF, method spoofing, and file upload support</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.forms-components') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Form Components</h5>
                <span class="badge bg-primary rounded-pill">2 components</span>
            </div>
            <p class="mb-1">Label and error display components</p>
        </a>
    </div>

    <h3 class="mb-3">Inputs</h3>
    <div class="list-group mb-4">
        <a href="{{ route('blade-ui-kit-bs.tests.inputs-text') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Text Inputs</h5>
                <span class="badge bg-primary rounded-pill">5 components</span>
            </div>
            <p class="mb-1">Generic, text, email, password, and hidden inputs</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.inputs-advanced') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Advanced Inputs</h5>
                <span class="badge bg-primary rounded-pill">5 components</span>
            </div>
            <p class="mb-1">Date, time, textarea, select, and checkbox inputs</p>
        </a>
    </div>

    <h3 class="mb-3">Modals</h3>
    <div class="list-group mb-4">
        <a href="{{ route('blade-ui-kit-bs.tests.modals-types') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Modal Types</h5>
                <span class="badge bg-primary rounded-pill">3 components</span>
            </div>
            <p class="mb-1">Basic modal, form modal, and confirm modal components</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.modals-variations') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Modal Variations</h5>
                <span class="badge bg-primary rounded-pill">Various options</span>
            </div>
            <p class="mb-1">Modal sizes, scrollable, centered, and content variations</p>
        </a>
    </div>

    <div class="mt-4">
        <h3>About This Package</h3>
        <p>
            <strong>Blade UI Kit Bootstrap</strong> provides pre-built Blade components styled with Bootstrap.
            It supports both Bootstrap 4 and Bootstrap 5, with automatic view resolution based on your configuration.
        </p>
        <ul>
            <li><strong>Current Bootstrap Version:</strong> {{ config('blade-ui-kit-bootstrap.bootstrap_version')->value }}</li>
            <li><strong>Total Components:</strong> 44</li>
            <li><strong>PHP Version:</strong> >= 8.4</li>
            <li><strong>Laravel Version:</strong> >= 12.0</li>
        </ul>
    </div>
@endsection
