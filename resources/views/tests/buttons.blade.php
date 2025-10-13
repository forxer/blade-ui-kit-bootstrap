@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Buttons')

@section('content')
    {{-- Simple Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Simple Button (btn)</h2>

        <h5 class="mt-3">Variants</h5>
        <div class="demo-block">
            <x-btn variant="primary">Primary</x-btn>
            <x-btn variant="secondary">Secondary</x-btn>
            <x-btn variant="success">Success</x-btn>
            <x-btn variant="danger">Danger</x-btn>
            <x-btn variant="warning">Warning</x-btn>
            <x-btn variant="info">Info</x-btn>
            <x-btn variant="light">Light</x-btn>
            <x-btn variant="dark">Dark</x-btn>
        </div>

        <h5 class="mt-3">Outline Variants</h5>
        <div class="demo-block">
            <x-btn variant="primary" outline>Primary</x-btn>
            <x-btn variant="secondary" outline>Secondary</x-btn>
            <x-btn variant="success" outline>Success</x-btn>
            <x-btn variant="danger" outline>Danger</x-btn>
        </div>

        <h5 class="mt-3">Sizes</h5>
        <div class="demo-block">
            <x-btn variant="primary" sm>Small</x-btn>
            <x-btn variant="primary">Normal</x-btn>
            <x-btn variant="primary" lg>Large</x-btn>
        </div>

        <h5 class="mt-3">With Icons</h5>
        <div class="demo-block">
            <x-btn variant="primary" start-icon="star">With Start Icon</x-btn>
            <x-btn variant="success" end-icon="check">With End Icon</x-btn>
            <x-btn variant="info" icon="info-circle">Icon Only</x-btn>
        </div>

        <h5 class="mt-3">States</h5>
        <div class="demo-block">
            <x-btn variant="primary" disabled>Disabled</x-btn>
            <x-btn variant="secondary" type="submit">Submit Button</x-btn>
            <x-btn variant="warning" type="reset">Reset Button</x-btn>
        </div>
    </div>

    {{-- Form Button --}}
    <div class="example-section">
        <h2 class="example-title">Form Button (form-button)</h2>
        <div class="demo-block">
            <x-form-button url="#" variant="primary">POST Form</x-form-button>
            <x-form-button url="#" method="DELETE" variant="danger">DELETE Form</x-form-button>
            <x-form-button url="#" method="PUT" variant="warning">PUT Form</x-form-button>
        </div>
    </div>

    {{-- Link Button --}}
    <div class="example-section">
        <h2 class="example-title">Link Button (link-button)</h2>
        <div class="demo-block">
            <x-link-button href="#" variant="primary">Link as Button</x-link-button>
            <x-link-button href="#" variant="success" start-icon="link">With Icon</x-link-button>
            <x-link-button variant="info" disabled>Disabled Link</x-link-button>
        </div>
    </div>

    {{-- Help Info --}}
    <div class="example-section">
        <h2 class="example-title">Help Info (help-info)</h2>

        <h5 class="mt-3">Using Slot</h5>
        <div class="demo-block">
            <x-help-info>Default Help Info</x-help-info>
            <x-help-info variant="info">Info Variant</x-help-info>
            <x-help-info variant="warning">Warning Variant</x-help-info>
        </div>

        <h5 class="mt-3">Using Content Attribute</h5>
        <div class="demo-block">
            <x-help-info content="Default Help Info" />
            <x-help-info content="Info Variant" variant="info" />
            <x-help-info content="Warning Variant" variant="warning" />
        </div>

        <h5 class="mt-3">With Custom Text</h5>
        <div class="demo-block">
            <x-help-info text="More Info">This is detailed help information</x-help-info>
            <x-help-info text="Help" variant="info">Additional context here</x-help-info>
        </div>

        <h5 class="mt-3">With Title</h5>
        <div class="demo-block">
            <x-help-info title="Help Title">This popover has a custom title</x-help-info>
            <x-help-info title="Important Info" variant="warning">Please read this carefully</x-help-info>
        </div>
    </div>

    {{-- Navigation Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Navigation Action Buttons</h2>
        <div class="demo-block">
            <x-btn-back url="#" />
            <x-btn-back-list url="#" />
            <x-btn-back-home url="#" />
        </div>
    </div>

    {{-- CRUD Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">CRUD Action Buttons</h2>
        <div class="demo-block">
            <x-btn-create url="#" />
            <x-btn-edit url="#" />
            <x-btn-show url="#" />
            <x-btn-save />
            <x-btn-delete url="#" />
            <x-btn-destroy url="#" />
        </div>
    </div>

    {{-- Archive Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Archive Action Buttons</h2>
        <div class="demo-block">
            <x-btn-archive url="#" />
            <x-btn-archives url="#" />
            <x-btn-recycle-bin url="#" />
            <x-btn-restore url="#" />
        </div>
    </div>

    {{-- Status Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Status Action Buttons</h2>
        <div class="demo-block">
            <x-btn-enable url="#" />
            <x-btn-enabled url="#" />
            <x-btn-disable url="#" />
            <x-btn-disabled url="#" />
        </div>
    </div>

    {{-- Order Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Order Action Buttons</h2>
        <div class="demo-block">
            <x-btn-move-up url="#" />
            <x-btn-move-down url="#" />
        </div>
    </div>

    {{-- Contact Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Contact Action Buttons</h2>
        <div class="demo-block">
            <x-btn-email url="mailto:test@example.com" />
            <x-btn-phone url="tel:+1234567890" />
            <x-btn-website url="https://example.com" />
        </div>
    </div>

    {{-- Other Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Other Action Buttons</h2>
        <div class="demo-block">
            <x-btn-cancel url="#" />
            <x-btn-copy string="Text to copy" />
            <x-btn-preview url="#" />
            <x-btn-logout url="#" />
        </div>
    </div>

    {{-- Modal Action Buttons --}}
    <div class="example-section">
        <h2 class="example-title">Modal Confirm Buttons</h2>
        <div class="demo-block">
            <x-btn-confirm-modal-yes />
            <x-btn-confirm-modal-no />
        </div>
        <p class="text-muted">
            <small>These buttons are designed to be used inside confirm modal components.</small>
        </p>
    </div>

    {{-- Button Customization Examples --}}
    <div class="example-section">
        <h2 class="example-title">Customization Examples</h2>

        <h5 class="mt-3">Custom Text and Variants</h5>
        <div class="demo-block">
            <x-btn-save text="Save Changes" variant="success" />
            <x-btn-delete url="#" text="Remove Item" variant="warning" />
            <x-btn-create url="#" text="Add New" variant="info" />
        </div>

        <h5 class="mt-3">With Custom Icons</h5>
        <div class="demo-block">
            <x-btn-save start-icon="floppy" />
            <x-btn-edit url="#" start-icon="pencil-square" />
            <x-btn-delete url="#" start-icon="trash3" />
        </div>

        <h5 class="mt-3">Sizes</h5>
        <div class="demo-block">
            <x-btn-save sm />
            <x-btn-save />
            <x-btn-save lg />
        </div>

        <h5 class="mt-3">Outline Style</h5>
        <div class="demo-block">
            <x-btn-create url="#" outline />
            <x-btn-edit url="#" outline />
            <x-btn-delete url="#" outline />
        </div>

        <h5 class="mt-3">With Additional Classes</h5>
        <div class="demo-block">
            <x-btn-save class="me-3" />
            <x-btn variant="primary" class="rounded-pill">Rounded Pill</x-btn>
        </div>
    </div>

    {{-- Code Examples --}}
    <div class="example-section">
        <h2 class="example-title">Code Examples</h2>

        <div class="code-example">
            <h6>Basic Usage</h6>
            <pre><code>&lt;x-btn variant="primary"&gt;Click Me&lt;/x-btn&gt;
&lt;x-btn variant="success" outline&gt;Outline Button&lt;/x-btn&gt;
&lt;x-btn variant="danger" disabled&gt;Disabled&lt;/x-btn&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>With Icons</h6>
            <pre><code>&lt;x-btn variant="primary" start-icon="star"&gt;With Icon&lt;/x-btn&gt;
&lt;x-btn variant="success" icon="check"&gt;Icon Only&lt;/x-btn&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Action Buttons</h6>
            <pre><code>&lt;x-btn-save /&gt;
&lt;x-btn-edit url="/posts/1/edit" /&gt;
&lt;x-btn-delete url="/posts/1" /&gt;
&lt;x-btn-create url="/posts/create" /&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Custom Action Buttons</h6>
            <pre><code>&lt;x-btn-save text="Save Changes" variant="success" /&gt;
&lt;x-btn-delete url="/posts/1" text="Remove" variant="warning" /&gt;
&lt;x-btn-create url="/posts/create" text="Add New" outline /&gt;</code></pre>
        </div>
    </div>
@endsection
