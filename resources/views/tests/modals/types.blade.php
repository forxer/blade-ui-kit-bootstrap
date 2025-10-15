@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Modal Types')

@section('content')
    {{-- Basic Modal --}}
    <div class="example-section" id="section-basic">
        <h2 class="example-title">Basic Modal</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-basic-modal">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Launch Basic Modal
            </button>

            <x-modal id="basicModal" title="Basic Modal">
                <p>This is a basic modal with default settings.</p>
                <p>It includes a title, content area, and a close button.</p>
            </x-modal>

            <x-slot:code>
&lt;!-- Trigger button --&gt;
&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"&gt;
    Launch Basic Modal
&lt;/button&gt;

&lt;!-- Modal --&gt;
&lt;x-modal id="basicModal" title="Basic Modal"&gt;
    &lt;p&gt;This is a basic modal with default settings.&lt;/p&gt;
    &lt;p&gt;It includes a title, content area, and a close button.&lt;/p&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Non-Dismissible Modal --}}
    <div class="example-section" id="section-non-dismissible">
        <h2 class="example-title">Non-Dismissible Modal</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-non-dismissible">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nonDismissibleModal">
                Launch Non-Dismissible Modal
            </button>

            <x-modal id="nonDismissibleModal" title="Non-Dismissible Modal" :dismissable="false">
                <p>This modal cannot be dismissed by clicking outside or pressing ESC.</p>
                <p>You must use the action buttons to close it.</p>

                <x-slot:footer>
                    <x-btn-cancel data-bs-dismiss="modal" />
                    <x-btn variant="primary">Accept</x-btn>
                </x-slot:footer>
            </x-modal>

            <x-slot:code>
&lt;x-modal id="nonDismissibleModal" title="Non-Dismissible Modal" :dismissable="false"&gt;
    &lt;p&gt;This modal cannot be dismissed by clicking outside or pressing ESC.&lt;/p&gt;
    &lt;p&gt;You must use the action buttons to close it.&lt;/p&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn-cancel data-bs-dismiss="modal" /&gt;
        &lt;x-btn variant="primary"&gt;Accept&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Modal with Custom Footer --}}
    <div class="example-section" id="section-custom-footer">
        <h2 class="example-title">Modal with Custom Footer</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-custom-footer">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#customFooterModal">
                Launch Modal with Custom Footer
            </button>

            <x-modal id="customFooterModal" title="Modal with Custom Footer">
                <p>This modal has a custom footer with multiple action buttons.</p>

                <x-slot:footer>
                    <x-btn-cancel data-bs-dismiss="modal" />
                    <x-btn variant="danger">Delete</x-btn>
                    <x-btn variant="success">Save</x-btn>
                </x-slot:footer>
            </x-modal>

            <x-slot:code>
&lt;x-modal id="customFooterModal" title="Modal with Custom Footer"&gt;
    &lt;p&gt;This modal has a custom footer with multiple action buttons.&lt;/p&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn-cancel data-bs-dismiss="modal" /&gt;
        &lt;x-btn variant="danger"&gt;Delete&lt;/x-btn&gt;
        &lt;x-btn variant="success"&gt;Save&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Modal with Form --}}
    <div class="example-section" id="section-form-content">
        <h2 class="example-title">Modal with Form Content</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-content">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#formContentModal">
                Launch Form Modal
            </button>

            <x-modal id="formContentModal" title="Edit Profile">
                <div class="mb-3">
                    <x-label for="modal_name">Name</x-label>
                    <x-input name="name" id="modal_name" value="John Doe" />
                </div>

                <div class="mb-3">
                    <x-label for="modal_email">Email</x-label>
                    <x-email name="email" id="modal_email" value="john@example.com" />
                </div>

                <div class="mb-3">
                    <x-label for="modal_bio">Bio</x-label>
                    <x-textarea name="bio" id="modal_bio" rows="3" />
                </div>

                <x-slot:footer>
                    <x-btn-cancel data-bs-dismiss="modal" />
                    <x-btn variant="primary">Save Changes</x-btn>
                </x-slot:footer>
            </x-modal>

            <x-slot:code>
&lt;x-modal id="formContentModal" title="Edit Profile"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="name"&gt;Name&lt;/x-label&gt;
        &lt;x-input name="name" id="name" value="John Doe" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="email"&gt;Email&lt;/x-label&gt;
        &lt;x-email name="email" id="email" value="john@example.com" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="bio"&gt;Bio&lt;/x-label&gt;
        &lt;x-textarea name="bio" id="bio" rows="3" /&gt;
    &lt;/div&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn-cancel data-bs-dismiss="modal" /&gt;
        &lt;x-btn variant="primary"&gt;Save Changes&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Form Modal --}}
    <div class="example-section" id="section-form-modal">
        <h2 class="example-title">Form Modal Component</h2>

        <h5 class="mt-3">Create Form Modal</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-modal-create">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Launch Form Modal
            </button>

            <x-form-modal id="formModal" title="Create New Item" action="#">
                <div class="mb-3">
                    <x-label for="item_title">Title</x-label>
                    <x-input name="title" id="item_title" />
                </div>

                <div class="mb-3">
                    <x-label for="item_description">Description</x-label>
                    <x-textarea name="description" id="item_description" rows="3" />
                </div>

                <div class="mb-3">
                    <x-label for="item_category">Category</x-label>
                    <x-select name="category" id="item_category">
                        <option value="">Select a category</option>
                        <option value="tech">Technology</option>
                        <option value="business">Business</option>
                        <option value="lifestyle">Lifestyle</option>
                    </x-select>
                </div>

                <x-slot:footer>
                    <x-btn variant="secondary" data-bs-dismiss="modal">Cancel</x-btn>
                    <x-btn type="submit" variant="primary">Create</x-btn>
                </x-slot:footer>
            </x-form-modal>

            <x-slot:code>
&lt;x-form-modal id="formModal" title="Create New Item" action="/items"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="title"&gt;Title&lt;/x-label&gt;
        &lt;x-input name="title" id="title" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="description"&gt;Description&lt;/x-label&gt;
        &lt;x-textarea name="description" id="description" rows="3" /&gt;
    &lt;/div&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="secondary" data-bs-dismiss="modal"&gt;Cancel&lt;/x-btn&gt;
        &lt;x-btn type="submit" variant="primary"&gt;Create&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-form-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Update Form Modal (PUT Method)</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-modal-update">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateFormModal">
                Launch Update Form Modal
            </button>

            <x-form-modal id="updateFormModal" title="Update Item" action="#" method="PUT">
                <div class="mb-3">
                    <x-label for="update_title">Title</x-label>
                    <x-input name="title" id="update_title" value="Existing Title" />
                </div>

                <div class="mb-3">
                    <x-label for="update_description">Description</x-label>
                    <x-textarea name="description" id="update_description" rows="3">Existing description</x-textarea>
                </div>

                <x-slot:footer>
                    <x-btn variant="secondary" data-bs-dismiss="modal">Cancel</x-btn>
                    <x-btn type="submit" variant="warning">Update</x-btn>
                </x-slot:footer>
            </x-form-modal>

            <x-slot:code>
&lt;x-form-modal id="updateFormModal" title="Update Item" action="/items/1" method="PUT"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="title"&gt;Title&lt;/x-label&gt;
        &lt;x-input name="title" id="title" value="Existing Title" /&gt;
    &lt;/div&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="secondary" data-bs-dismiss="modal"&gt;Cancel&lt;/x-btn&gt;
        &lt;x-btn type="submit" variant="warning"&gt;Update&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-form-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Confirm Modal --}}
    <div class="example-section" id="section-confirm">
        <h2 class="example-title">Confirm Modal Component</h2>

        <h5 class="mt-3">Basic Confirm Modal</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-confirm-basic">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
                Launch Confirm Modal
            </button>

            <x-confirm-modal
                id="confirmModal"
                title="Confirm Action"
                message="Are you sure you want to proceed with this action?"
                url="#"
            />

            <x-slot:code>
&lt;button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal"&gt;
    Launch Confirm Modal
&lt;/button&gt;

&lt;x-confirm-modal
    id="confirmModal"
    title="Confirm Action"
    message="Are you sure you want to proceed with this action?"
    url="/action"
/&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Confirm Delete</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-confirm-delete">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">
                Delete Item
            </button>

            <x-confirm-modal
                id="confirmDelete"
                title="Confirm Delete"
                message="Are you sure you want to delete this item? This action cannot be undone."
                url="#"
                method="DELETE"
            />

            <x-slot:code>
&lt;button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete"&gt;
    Delete Item
&lt;/button&gt;

&lt;x-confirm-modal
    id="confirmDelete"
    title="Confirm Delete"
    message="Are you sure you want to delete this item? This action cannot be undone."
    url="/items/1"
    method="DELETE"
/&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Custom Confirm Modal</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-confirm-custom">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#customConfirm">
                Archive Item
            </button>

            <x-confirm-modal
                id="customConfirm"
                title="Archive Confirmation"
                message="Do you want to archive this item? You can restore it later from the archives."
                url="#"
                method="PATCH"
                yes-text="Yes, Archive"
                no-text="No, Keep It"
                yes-variant="warning"
            />

            <x-slot:code>
&lt;x-confirm-modal
    id="customConfirm"
    title="Archive Confirmation"
    message="Do you want to archive this item? You can restore it later from the archives."
    url="/items/1/archive"
    method="PATCH"
    yes-text="Yes, Archive"
    no-text="No, Keep It"
    yes-variant="warning"
/&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-basic', 'title' => 'Basic Modal'],
        ['id' => 'section-non-dismissible', 'title' => 'Non-Dismissible Modal'],
        ['id' => 'section-custom-footer', 'title' => 'Modal with Custom Footer'],
        ['id' => 'section-form-content', 'title' => 'Modal with Form Content'],
        ['id' => 'section-form-modal', 'title' => 'Form Modal Component'],
        ['id' => 'section-confirm', 'title' => 'Confirm Modal Component'],
    ]" />
@endsection
