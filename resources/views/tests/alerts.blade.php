@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Alerts')

@section('content')
    {{-- Alert Variants --}}
    <div class="example-section" id="section-variants">
        <h2 class="example-title">Alert Variants</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-variants">
            <x-alert variant="primary">This is a primary alert!</x-alert>
            <x-alert variant="secondary">This is a secondary alert!</x-alert>
            <x-alert variant="success">This is a success alert!</x-alert>
            <x-alert variant="danger">This is a danger alert!</x-alert>
            <x-alert variant="warning">This is a warning alert!</x-alert>
            <x-alert variant="info">This is an info alert!</x-alert>
            <x-alert variant="light">This is a light alert!</x-alert>
            <x-alert variant="dark">This is a dark alert!</x-alert>

            <x-slot:code>
&lt;x-alert variant="primary"&gt;This is a primary alert!&lt;/x-alert&gt;
&lt;x-alert variant="secondary"&gt;This is a secondary alert!&lt;/x-alert&gt;
&lt;x-alert variant="success"&gt;This is a success alert!&lt;/x-alert&gt;
&lt;x-alert variant="danger"&gt;This is a danger alert!&lt;/x-alert&gt;
&lt;x-alert variant="warning"&gt;This is a warning alert!&lt;/x-alert&gt;
&lt;x-alert variant="info"&gt;This is an info alert!&lt;/x-alert&gt;
&lt;x-alert variant="light"&gt;This is a light alert!&lt;/x-alert&gt;
&lt;x-alert variant="dark"&gt;This is a dark alert!&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Dismissible Alerts --}}
    <div class="example-section" id="section-dismissible">
        <h2 class="example-title">Dismissible Alerts</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-dismissible">
            <x-alert variant="success" dismissible>
                This alert can be dismissed by clicking the close button.
            </x-alert>
            <x-alert variant="warning" dismissible>
                Don't forget to save your changes before leaving!
            </x-alert>
            <x-alert variant="danger" dismissible>
                An error occurred. Please try again.
            </x-alert>

            <x-slot:code>
&lt;x-alert variant="success" dismissible&gt;
    This alert can be dismissed by clicking the close button.
&lt;/x-alert&gt;
&lt;x-alert variant="warning" dismissible&gt;
    Don't forget to save your changes before leaving!
&lt;/x-alert&gt;
&lt;x-alert variant="danger" dismissible&gt;
    An error occurred. Please try again.
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Alerts with Title --}}
    <div class="example-section" id="section-title">
        <h2 class="example-title">Alerts with Title</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-title">
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

            <x-slot:code>
&lt;x-alert variant="success" title="Well done!"&gt;
    You successfully read this important alert message.
&lt;/x-alert&gt;
&lt;x-alert variant="info" title="Heads up!"&gt;
    This alert needs your attention, but it's not super important.
&lt;/x-alert&gt;
&lt;x-alert variant="warning" title="Warning!"&gt;
    Better check yourself, you're not looking too good.
&lt;/x-alert&gt;
&lt;x-alert variant="danger" title="Oh snap!"&gt;
    Change a few things up and try submitting again.
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Alerts with Title and Dismissible --}}
    <div class="example-section" id="section-title-dismissible">
        <h2 class="example-title">Alerts with Title and Dismissible</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-title-dismissible">
            <x-alert variant="success" title="Success!" dismissible>
                Your changes have been saved successfully.
            </x-alert>
            <x-alert variant="danger" title="Error!" dismissible>
                There was a problem processing your request.
            </x-alert>

            <x-slot:code>
&lt;x-alert variant="success" title="Success!" dismissible&gt;
    Your changes have been saved successfully.
&lt;/x-alert&gt;
&lt;x-alert variant="danger" title="Error!" dismissible&gt;
    There was a problem processing your request.
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Alerts with Icons --}}
    <div class="example-section" id="section-icons">
        <h2 class="example-title">Alerts with Icons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-icons">
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

            <x-slot:code>
&lt;x-alert variant="success" icon="check-circle"&gt;
    Your operation completed successfully!
&lt;/x-alert&gt;
&lt;x-alert variant="info" icon="info-circle"&gt;
    Here's some useful information for you.
&lt;/x-alert&gt;
&lt;x-alert variant="warning" icon="exclamation-triangle"&gt;
    Please review the following warnings.
&lt;/x-alert&gt;
&lt;x-alert variant="danger" icon="x-circle"&gt;
    An error has occurred!
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Alerts with Icon and Title --}}
    <div class="example-section" id="section-icon-title">
        <h2 class="example-title">Alerts with Icon and Title</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-icon-title">
            <x-alert variant="success" icon="check-circle" title="Success!">
                Your profile has been updated successfully.
            </x-alert>
            <x-alert variant="warning" icon="exclamation-triangle" title="Warning!">
                Your session will expire in 5 minutes.
            </x-alert>

            <x-slot:code>
&lt;x-alert variant="success" icon="check-circle" title="Success!"&gt;
    Your profile has been updated successfully.
&lt;/x-alert&gt;
&lt;x-alert variant="warning" icon="exclamation-triangle" title="Warning!"&gt;
    Your session will expire in 5 minutes.
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Alerts with Icon, Title, and Dismissible --}}
    <div class="example-section" id="section-full-featured">
        <h2 class="example-title">Alerts with Icon, Title, and Dismissible</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-full">
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

            <x-slot:code>
&lt;x-alert variant="success" icon="check-circle" title="Success!" dismissible&gt;
    Your changes have been saved successfully.
&lt;/x-alert&gt;
&lt;x-alert variant="info" icon="info-circle" title="Information" dismissible&gt;
    New features are now available!
&lt;/x-alert&gt;
&lt;x-alert variant="warning" icon="exclamation-triangle" title="Warning!" dismissible&gt;
    Your password will expire in 3 days.
&lt;/x-alert&gt;
&lt;x-alert variant="danger" icon="x-circle" title="Error!" dismissible&gt;
    Failed to connect to the server.
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Show/Hide Control --}}
    <div class="example-section" id="section-show-hide">
        <h2 class="example-title">Show/Hide Control</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-show-hide">
            <x-alert variant="success" :show="true">
                This alert is shown by default (show=true).
            </x-alert>
            <x-alert variant="info" :hide="false">
                This alert is visible (hide=false).
            </x-alert>

            <x-slot:code>
&lt;x-alert variant="success" :show="true"&gt;
    This alert is shown by default (show=true).
&lt;/x-alert&gt;
&lt;x-alert variant="info" :hide="false"&gt;
    This alert is visible (hide=false).
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
        <p class="text-muted">
            <small>Use the <code>show</code> or <code>hide</code> attributes to control alert visibility dynamically.</small>
        </p>
    </div>

    {{-- Custom Classes --}}
    <div class="example-section" id="section-custom-classes">
        <h2 class="example-title">With Custom Classes</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-alert-custom">
            <x-alert variant="primary" class="border-start border-5 border-primary">
                Alert with custom border styling.
            </x-alert>
            <x-alert variant="success" class="shadow-sm">
                Alert with shadow effect.
            </x-alert>

            <x-slot:code>
&lt;x-alert variant="primary" class="border-start border-5 border-primary"&gt;
    Alert with custom border styling.
&lt;/x-alert&gt;
&lt;x-alert variant="success" class="shadow-sm"&gt;
    Alert with shadow effect.
&lt;/x-alert&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection
