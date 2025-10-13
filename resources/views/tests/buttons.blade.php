@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Buttons')

@section('content')
    {{-- Table of Contents --}}
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-simple-button', 'title' => 'Simple Button'],
        ['id' => 'section-form-button', 'title' => 'Form Button'],
        ['id' => 'section-link-button', 'title' => 'Link Button'],
        ['id' => 'section-help-info', 'title' => 'Help Info'],
        ['id' => 'section-navigation', 'title' => 'Navigation Buttons'],
        ['id' => 'section-crud', 'title' => 'CRUD Buttons'],
        ['id' => 'section-archive', 'title' => 'Archive Buttons'],
        ['id' => 'section-status', 'title' => 'Status Buttons'],
        ['id' => 'section-order', 'title' => 'Order Buttons'],
        ['id' => 'section-contact', 'title' => 'Contact Buttons'],
        ['id' => 'section-other', 'title' => 'Other Buttons'],
        ['id' => 'section-modal', 'title' => 'Modal Buttons'],
        ['id' => 'section-customization', 'title' => 'Customization'],
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
    </div>

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
    </div>

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
    </div>

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
    </div>

    {{-- Navigation Action Buttons --}}
    <div class="example-section" id="section-navigation">
        <h2 class="example-title">Navigation Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-nav-buttons">
            <x-btn-back url="#" />
            <x-btn-back-list url="#" />
            <x-btn-back-home url="#" />

            <x-slot:code>
&lt;x-btn-back url="#" /&gt;
&lt;x-btn-back-list url="#" /&gt;
&lt;x-btn-back-home url="#" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- CRUD Action Buttons --}}
    <div class="example-section" id="section-crud">
        <h2 class="example-title">CRUD Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-crud-buttons">
            <x-btn-create url="#" />
            <x-btn-edit url="#" />
            <x-btn-show url="#" />
            <x-btn-save />
            <x-btn-delete url="#" />
            <x-btn-destroy url="#" />

            <x-slot:code>
&lt;x-btn-create url="#" /&gt;
&lt;x-btn-edit url="#" /&gt;
&lt;x-btn-show url="#" /&gt;
&lt;x-btn-save /&gt;
&lt;x-btn-delete url="#" /&gt;
&lt;x-btn-destroy url="#" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Archive Action Buttons --}}
    <div class="example-section" id="section-archive">
        <h2 class="example-title">Archive Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-archive-buttons">
            <x-btn-archive url="#" />
            <x-btn-archives url="#" />
            <x-btn-recycle-bin url="#" />
            <x-btn-restore url="#" />

            <x-slot:code>
&lt;x-btn-archive url="#" /&gt;
&lt;x-btn-archives url="#" /&gt;
&lt;x-btn-recycle-bin url="#" /&gt;
&lt;x-btn-restore url="#" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Status Action Buttons --}}
    <div class="example-section" id="section-status">
        <h2 class="example-title">Status Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-status-buttons">
            <x-btn-enable url="#" />
            <x-btn-enabled url="#" />
            <x-btn-disable url="#" />
            <x-btn-disabled url="#" />

            <x-slot:code>
&lt;x-btn-enable url="#" /&gt;
&lt;x-btn-enabled url="#" /&gt;
&lt;x-btn-disable url="#" /&gt;
&lt;x-btn-disabled url="#" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Order Action Buttons --}}
    <div class="example-section" id="section-order">
        <h2 class="example-title">Order Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-order-buttons">
            <x-btn-move-up url="#" />
            <x-btn-move-down url="#" />

            <x-slot:code>
&lt;x-btn-move-up url="#" /&gt;
&lt;x-btn-move-down url="#" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Contact Action Buttons --}}
    <div class="example-section" id="section-contact">
        <h2 class="example-title">Contact Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-contact-buttons">
            <x-btn-email url="mailto:test@example.com" />
            <x-btn-phone url="tel:+1234567890" />
            <x-btn-website url="https://example.com" />

            <x-slot:code>
&lt;x-btn-email url="mailto:test@example.com" /&gt;
&lt;x-btn-phone url="tel:+1234567890" /&gt;
&lt;x-btn-website url="https://example.com" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Other Action Buttons --}}
    <div class="example-section" id="section-other">
        <h2 class="example-title">Other Action Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-other-buttons">
            <x-btn-cancel url="#" />
            <x-btn-copy string="Text to copy" />
            <x-btn-preview url="#" />
            <x-btn-logout url="#" />

            <x-slot:code>
&lt;x-btn-cancel url="#" /&gt;
&lt;x-btn-copy string="Text to copy" /&gt;
&lt;x-btn-preview url="#" /&gt;
&lt;x-btn-logout url="#" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Modal Action Buttons --}}
    <div class="example-section" id="section-modal">
        <h2 class="example-title">Modal Confirm Buttons</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-modal-buttons">
            <x-btn-confirm-modal-yes />
            <x-btn-confirm-modal-no />

            <x-slot:code>
&lt;x-btn-confirm-modal-yes /&gt;
&lt;x-btn-confirm-modal-no /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
        <p class="text-muted">
            <small>These buttons are designed to be used inside confirm modal components.</small>
        </p>
    </div>

    {{-- Button Customization Examples --}}
    <div class="example-section" id="section-customization">
        <h2 class="example-title">Customization Examples</h2>

        <h5 class="mt-3">Custom Text and Variants</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-custom-text">
            <x-btn-save text="Save Changes" variant="success" />
            <x-btn-delete url="#" text="Remove Item" variant="warning" />
            <x-btn-create url="#" text="Add New" variant="info" />

            <x-slot:code>
&lt;x-btn-save text="Save Changes" variant="success" /&gt;
&lt;x-btn-delete url="#" text="Remove Item" variant="warning" /&gt;
&lt;x-btn-create url="#" text="Add New" variant="info" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">With Custom Icons</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-custom-icons">
            <x-btn-save start-icon="floppy" />
            <x-btn-edit url="#" start-icon="pencil-square" />
            <x-btn-delete url="#" start-icon="trash3" />

            <x-slot:code>
&lt;x-btn-save start-icon="floppy" /&gt;
&lt;x-btn-edit url="#" start-icon="pencil-square" /&gt;
&lt;x-btn-delete url="#" start-icon="trash3" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Sizes</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-custom-sizes">
            <x-btn-save sm />
            <x-btn-save />
            <x-btn-save lg />

            <x-slot:code>
&lt;x-btn-save sm /&gt;
&lt;x-btn-save /&gt;
&lt;x-btn-save lg /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Outline Style</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-custom-outline">
            <x-btn-create url="#" outline />
            <x-btn-edit url="#" outline />
            <x-btn-delete url="#" outline />

            <x-slot:code>
&lt;x-btn-create url="#" outline /&gt;
&lt;x-btn-edit url="#" outline /&gt;
&lt;x-btn-delete url="#" outline /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">With Additional Classes</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-custom-classes">
            <x-btn-save class="me-3" />
            <x-btn variant="primary" class="rounded-pill">Rounded Pill</x-btn>

            <x-slot:code>
&lt;x-btn-save class="me-3" /&gt;
&lt;x-btn variant="primary" class="rounded-pill"&gt;Rounded Pill&lt;/x-btn&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection
