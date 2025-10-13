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
        <p class="mb-0">
            Select a category from the navigation above to explore the components.
        </p>
    </div>

    <div class="list-group">
        <a href="{{ route('blade-ui-kit-bs.tests.buttons') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Buttons</h5>
                <span class="badge bg-primary rounded-pill">27 components</span>
            </div>
            <p class="mb-1">Simple buttons, form buttons, link buttons, help info, and 23 action buttons</p>
        </a>

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

        <a href="{{ route('blade-ui-kit-bs.tests.forms') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Forms</h5>
                <span class="badge bg-primary rounded-pill">3 components</span>
            </div>
            <p class="mb-1">Form wrapper, label, and error display components</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.inputs') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Inputs</h5>
                <span class="badge bg-primary rounded-pill">10 components</span>
            </div>
            <p class="mb-1">Text, textarea, select, checkbox, password, email, date, time, hidden, and generic input components</p>
        </a>

        <a href="{{ route('blade-ui-kit-bs.tests.modals') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-1">Modals</h5>
                <span class="badge bg-primary rounded-pill">3 components</span>
            </div>
            <p class="mb-1">Modal, confirm modal, and form modal components</p>
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
