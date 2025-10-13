@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Alerts')

@section('content')
    {{-- Basic Alerts --}}
    <div class="example-section">
        <h2 class="example-title">Alert Variants</h2>
        <div class="demo-block">
            <x-alert variant="primary">This is a primary alert!</x-alert>
            <x-alert variant="secondary">This is a secondary alert!</x-alert>
            <x-alert variant="success">This is a success alert!</x-alert>
            <x-alert variant="danger">This is a danger alert!</x-alert>
            <x-alert variant="warning">This is a warning alert!</x-alert>
            <x-alert variant="info">This is an info alert!</x-alert>
            <x-alert variant="light">This is a light alert!</x-alert>
            <x-alert variant="dark">This is a dark alert!</x-alert>
        </div>
    </div>

    {{-- Dismissible Alerts --}}
    <div class="example-section">
        <h2 class="example-title">Dismissible Alerts</h2>
        <div class="demo-block">
            <x-alert variant="success" dismissible>
                This alert can be dismissed by clicking the close button.
            </x-alert>
            <x-alert variant="warning" dismissible>
                Don't forget to save your changes before leaving!
            </x-alert>
            <x-alert variant="danger" dismissible>
                An error occurred. Please try again.
            </x-alert>
        </div>
    </div>

    {{-- Alerts with Title --}}
    <div class="example-section">
        <h2 class="example-title">Alerts with Title</h2>
        <div class="demo-block">
            <x-alert variant="success" title="Well done!">
                You successfully read this important alert message.
            </x-alert>
            <x-alert variant="info" title="Heads up!">
                This alert needs your attention, but it's not super important.
            </x-alert>
            <x-alert variant="warning" title="Warning!">
                Better check yourself, you're not looking too good.
            </x-alert>
            <x-alert variant="danger" title="Oh snap!">
                Change a few things up and try submitting again.
            </x-alert>
        </div>
    </div>

    {{-- Alerts with Title and Dismissible --}}
    <div class="example-section">
        <h2 class="example-title">Alerts with Title and Dismissible</h2>
        <div class="demo-block">
            <x-alert variant="success" title="Success!" dismissible>
                Your changes have been saved successfully.
            </x-alert>
            <x-alert variant="danger" title="Error!" dismissible>
                There was a problem processing your request.
            </x-alert>
        </div>
    </div>

    {{-- Alerts with Icons --}}
    <div class="example-section">
        <h2 class="example-title">Alerts with Icons</h2>
        <div class="demo-block">
            <x-alert variant="success" icon="check-circle">
                Your operation completed successfully!
            </x-alert>
            <x-alert variant="info" icon="info-circle">
                Here's some useful information for you.
            </x-alert>
            <x-alert variant="warning" icon="exclamation-triangle">
                Please review the following warnings.
            </x-alert>
            <x-alert variant="danger" icon="x-circle">
                An error has occurred!
            </x-alert>
        </div>
    </div>

    {{-- Alerts with Icon and Title --}}
    <div class="example-section">
        <h2 class="example-title">Alerts with Icon and Title</h2>
        <div class="demo-block">
            <x-alert variant="success" icon="check-circle" title="Success!">
                Your profile has been updated successfully.
            </x-alert>
            <x-alert variant="warning" icon="exclamation-triangle" title="Warning!">
                Your session will expire in 5 minutes.
            </x-alert>
        </div>
    </div>

    {{-- Alerts with Icon, Title, and Dismissible --}}
    <div class="example-section">
        <h2 class="example-title">Alerts with Icon, Title, and Dismissible</h2>
        <div class="demo-block">
            <x-alert variant="success" icon="check-circle" title="Success!" dismissible>
                Your changes have been saved successfully.
            </x-alert>
            <x-alert variant="info" icon="info-circle" title="Information" dismissible>
                New features are now available!
            </x-alert>
            <x-alert variant="warning" icon="exclamation-triangle" title="Warning!" dismissible>
                Your password will expire in 3 days.
            </x-alert>
            <x-alert variant="danger" icon="x-circle" title="Error!" dismissible>
                Failed to connect to the server.
            </x-alert>
        </div>
    </div>

    {{-- Hidden/Shown Alerts --}}
    <div class="example-section">
        <h2 class="example-title">Show/Hide Control</h2>
        <div class="demo-block">
            <x-alert variant="success" :show="true">
                This alert is shown by default (show=true).
            </x-alert>
            <x-alert variant="info" :hide="false">
                This alert is visible (hide=false).
            </x-alert>
        </div>
        <p class="text-muted">
            <small>Use the <code>show</code> or <code>hide</code> attributes to control alert visibility dynamically.</small>
        </p>
    </div>

    {{-- Custom Classes --}}
    <div class="example-section">
        <h2 class="example-title">With Custom Classes</h2>
        <div class="demo-block">
            <x-alert variant="primary" class="border-start border-5 border-primary">
                Alert with custom border styling.
            </x-alert>
            <x-alert variant="success" class="shadow-sm">
                Alert with shadow effect.
            </x-alert>
        </div>
    </div>

    {{-- Code Examples --}}
    <div class="example-section">
        <h2 class="example-title">Code Examples</h2>

        <div class="code-example">
            <h6>Basic Alert</h6>
            <pre><code>&lt;x-alert variant="success"&gt;
    This is a success message!
&lt;/x-alert&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Dismissible Alert</h6>
            <pre><code>&lt;x-alert variant="warning" dismissible&gt;
    This alert can be closed.
&lt;/x-alert&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Alert with Title</h6>
            <pre><code>&lt;x-alert variant="info" title="Heads up!"&gt;
    This is an informational message.
&lt;/x-alert&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Alert with Icon</h6>
            <pre><code>&lt;x-alert variant="success" icon="check-circle"&gt;
    Operation completed successfully!
&lt;/x-alert&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Full Featured Alert</h6>
            <pre><code>&lt;x-alert variant="danger" icon="x-circle" title="Error!" dismissible&gt;
    An error occurred while processing your request.
&lt;/x-alert&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Show/Hide Control</h6>
            <pre><code>&lt;x-alert variant="info" :show="$showAlert"&gt;
    Conditionally shown alert.
&lt;/x-alert&gt;

&lt;x-alert variant="warning" :hide="$hideAlert"&gt;
    Conditionally hidden alert.
&lt;/x-alert&gt;</code></pre>
        </div>
    </div>
@endsection
