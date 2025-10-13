@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Action Buttons')

@section('content')
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

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
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
@endsection
