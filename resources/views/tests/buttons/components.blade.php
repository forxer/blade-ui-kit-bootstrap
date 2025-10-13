@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Button Components')

@section('content')
    {{-- Table of Contents --}}
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-simple-button', 'title' => 'Simple Button'],
        ['id' => 'section-form-button', 'title' => 'Form Button'],
        ['id' => 'section-link-button', 'title' => 'Link Button'],
        ['id' => 'section-help-info', 'title' => 'Help Info'],
    ]" />

    {{-- Simple Buttons --}}
    <div class="example-section" id="section-simple-button">
        <h2 class="example-title">Simple Button (btn)</h2>

        <h5 class="mt-3">Variants</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-btn-variants">
            <x-btn variant="primary">Primary</x-btn>
            <x-btn variant="secondary">Secondary</x-btn>
            <x-btn variant="success">Success</x-btn>
            <x-btn variant="danger">Danger</x-btn>
            <x-btn variant="warning">Warning</x-btn>
            <x-btn variant="info">Info</x-btn>
            <x-btn variant="light">Light</x-btn>
            <x-btn variant="dark">Dark</x-btn>

            <x-slot:code>
&lt;x-btn variant="primary"&gt;Primary&lt;/x-btn&gt;
&lt;x-btn variant="secondary"&gt;Secondary&lt;/x-btn&gt;
&lt;x-btn variant="success"&gt;Success&lt;/x-btn&gt;
&lt;x-btn variant="danger"&gt;Danger&lt;/x-btn&gt;
&lt;x-btn variant="warning"&gt;Warning&lt;/x-btn&gt;
&lt;x-btn variant="info"&gt;Info&lt;/x-btn&gt;
&lt;x-btn variant="light"&gt;Light&lt;/x-btn&gt;
&lt;x-btn variant="dark"&gt;Dark&lt;/x-btn&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Outline Variants</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-btn-outline">
            
                <x-btn variant="primary" outline>Primary</x-btn>
                <x-btn variant="secondary" outline>Secondary</x-btn>
                <x-btn variant="success" outline>Success</x-btn>
                <x-btn variant="danger" outline>Danger</x-btn>
            

            <x-slot:code>
&lt;x-btn variant="primary" outline&gt;Primary&lt;/x-btn&gt;
&lt;x-btn variant="secondary" outline&gt;Secondary&lt;/x-btn&gt;
&lt;x-btn variant="success" outline&gt;Success&lt;/x-btn&gt;
&lt;x-btn variant="danger" outline&gt;Danger&lt;/x-btn&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Sizes</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-btn-sizes">
            
                <x-btn variant="primary" sm>Small</x-btn>
                <x-btn variant="primary">Normal</x-btn>
                <x-btn variant="primary" lg>Large</x-btn>
            

            <x-slot:code>
&lt;x-btn variant="primary" sm&gt;Small&lt;/x-btn&gt;
&lt;x-btn variant="primary"&gt;Normal&lt;/x-btn&gt;
&lt;x-btn variant="primary" lg&gt;Large&lt;/x-btn&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">With Icons</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-btn-icons">
            
                <x-btn variant="primary" start-icon="star">With Start Icon</x-btn>
                <x-btn variant="success" end-icon="check">With End Icon</x-btn>
                <x-btn variant="info" icon="info-circle">Icon Only</x-btn>
            

            <x-slot:code>
&lt;x-btn variant="primary" start-icon="star"&gt;With Start Icon&lt;/x-btn&gt;
&lt;x-btn variant="success" end-icon="check"&gt;With End Icon&lt;/x-btn&gt;
&lt;x-btn variant="info" icon="info-circle"&gt;Icon Only&lt;/x-btn&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">States</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-btn-states">
            
                <x-btn variant="primary" disabled>Disabled</x-btn>
                <x-btn variant="secondary" type="submit">Submit Button</x-btn>
                <x-btn variant="warning" type="reset">Reset Button</x-btn>
            

            <x-slot:code>
&lt;x-btn variant="primary" disabled&gt;Disabled&lt;/x-btn&gt;
&lt;x-btn variant="secondary" type="submit"&gt;Submit Button&lt;/x-btn&gt;
&lt;x-btn variant="warning" type="reset"&gt;Reset Button&lt;/x-btn&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    

    {{-- Form Button --}}
    <div class="example-section" id="section-form-button">
        <h2 class="example-title">Form Button (form-button)</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-button">
            
                <x-form-button url="#" variant="primary">POST Form</x-form-button>
                <x-form-button url="#" method="DELETE" variant="danger">DELETE Form</x-form-button>
                <x-form-button url="#" method="PUT" variant="warning">PUT Form</x-form-button>
            

            <x-slot:code>
&lt;x-form-button url="#" variant="primary"&gt;POST Form&lt;/x-form-button&gt;
&lt;x-form-button url="#" method="DELETE" variant="danger"&gt;DELETE Form&lt;/x-form-button&gt;
&lt;x-form-button url="#" method="PUT" variant="warning"&gt;PUT Form&lt;/x-form-button&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    

    {{-- Link Button --}}
    <div class="example-section" id="section-link-button">
        <h2 class="example-title">Link Button (link-button)</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-link-button">
            
                <x-link-button href="#" variant="primary">Link as Button</x-link-button>
                <x-link-button href="#" variant="success" start-icon="link">With Icon</x-link-button>
                <x-link-button variant="info" disabled>Disabled Link</x-link-button>
            

            <x-slot:code>
&lt;x-link-button href="#" variant="primary"&gt;Link as Button&lt;/x-link-button&gt;
&lt;x-link-button href="#" variant="success" start-icon="link"&gt;With Icon&lt;/x-link-button&gt;
&lt;x-link-button variant="info" disabled&gt;Disabled Link&lt;/x-link-button&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    

    {{-- Help Info --}}
    <div class="example-section" id="section-help-info">
        <h2 class="example-title">Help Info (help-info)</h2>

        <h5 class="mt-3">Using Slot</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-help-slot">
            
                <x-help-info>Default Help Info</x-help-info>
                <x-help-info variant="info">Info Variant</x-help-info>
                <x-help-info variant="warning">Warning Variant</x-help-info>
            

            <x-slot:code>
&lt;x-help-info&gt;Default Help Info&lt;/x-help-info&gt;
&lt;x-help-info variant="info"&gt;Info Variant&lt;/x-help-info&gt;
&lt;x-help-info variant="warning"&gt;Warning Variant&lt;/x-help-info&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Using Content Attribute</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-help-attr">
            
                <x-help-info content="Default Help Info" />
                <x-help-info content="Info Variant" variant="info" />
                <x-help-info content="Warning Variant" variant="warning" />
            

            <x-slot:code>
&lt;x-help-info content="Default Help Info" /&gt;
&lt;x-help-info content="Info Variant" variant="info" /&gt;
&lt;x-help-info content="Warning Variant" variant="warning" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">With Custom Text</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-help-text">
            
                <x-help-info text="More Info">This is detailed help information</x-help-info>
                <x-help-info text="Help" variant="info">Additional context here</x-help-info>
            

            <x-slot:code>
&lt;x-help-info text="More Info"&gt;This is detailed help information&lt;/x-help-info&gt;
&lt;x-help-info text="Help" variant="info"&gt;Additional context here&lt;/x-help-info&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">With Title</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-help-title">
            
                <x-help-info title="Help Title">This popover has a custom title</x-help-info>
                <x-help-info title="Important Info" variant="warning">Please read this carefully</x-help-info>
            

            <x-slot:code>
&lt;x-help-info title="Help Title"&gt;This popover has a custom title&lt;/x-help-info&gt;
&lt;x-help-info title="Important Info" variant="warning"&gt;Please read this carefully&lt;/x-help-info&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    
@endsection
