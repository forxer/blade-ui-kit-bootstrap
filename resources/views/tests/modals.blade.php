@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Modals')

@section('content')
    {{-- Basic Modal --}}
    <div class="example-section">
        <h2 class="example-title">Basic Modal</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Launch Basic Modal
            </button>

            <x-modal id="basicModal" title="Basic Modal">
                <p>This is a basic modal with default settings.</p>
                <p>It includes a title, content area, and a close button.</p>
            </x-modal>
        </div>
    </div>

    {{-- Non-Dismissible Modal --}}
    <div class="example-section">
        <h2 class="example-title">Non-Dismissible Modal</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nonDismissibleModal">
                Launch Non-Dismissible Modal
            </button>

            <x-modal id="nonDismissibleModal" title="Non-Dismissible Modal" :dismissable="false">
                <p>This modal cannot be dismissed by clicking outside or pressing ESC.</p>
                <p>You must use the action buttons to close it.</p>

                <x-slot:footer>
                    <x-btn variant="secondary" data-bs-dismiss="modal">Close</x-btn>
                    <x-btn variant="primary">Accept</x-btn>
                </x-slot:footer>
            </x-modal>
        </div>
    </div>

    {{-- Modal with Custom Footer --}}
    <div class="example-section">
        <h2 class="example-title">Modal with Custom Footer</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#customFooterModal">
                Launch Modal with Custom Footer
            </button>

            <x-modal id="customFooterModal" title="Modal with Custom Footer">
                <p>This modal has a custom footer with multiple action buttons.</p>

                <x-slot:footer>
                    <x-btn variant="secondary" data-bs-dismiss="modal">Cancel</x-btn>
                    <x-btn variant="danger">Delete</x-btn>
                    <x-btn variant="success">Save</x-btn>
                </x-slot:footer>
            </x-modal>
        </div>
    </div>

    {{-- Modal with Form --}}
    <div class="example-section">
        <h2 class="example-title">Modal with Form Content</h2>

        <div class="demo-block">
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
                    <x-btn variant="secondary" data-bs-dismiss="modal">Cancel</x-btn>
                    <x-btn variant="primary">Save Changes</x-btn>
                </x-slot:footer>
            </x-modal>
        </div>
    </div>

    {{-- Form Modal --}}
    <div class="example-section">
        <h2 class="example-title">Form Modal Component</h2>

        <div class="demo-block">
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
        </div>

        <h5 class="mt-4">Form Modal with Different Method</h5>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Confirm Modal --}}
    <div class="example-section">
        <h2 class="example-title">Confirm Modal Component</h2>

        <h5 class="mt-3">Basic Confirm Modal</h5>
        <div class="demo-block">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
                Launch Confirm Modal
            </button>

            <x-confirm-modal
                id="confirmModal"
                title="Confirm Action"
                message="Are you sure you want to proceed with this action?"
                url="#"
            />
        </div>

        <h5 class="mt-4">Confirm Delete</h5>
        <div class="demo-block">
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
        </div>

        <h5 class="mt-4">Custom Confirm Modal</h5>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Modal Sizes --}}
    <div class="example-section">
        <h2 class="example-title">Modal Sizes</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                Small Modal
            </button>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModal">
                Default Modal
            </button>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                Large Modal
            </button>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extraLargeModal">
                Extra Large Modal
            </button>

            {{-- Small --}}
            <x-modal id="smallModal" title="Small Modal" size="sm">
                <p>This is a small modal.</p>
            </x-modal>

            {{-- Default --}}
            <x-modal id="defaultModal" title="Default Modal">
                <p>This is a default sized modal.</p>
            </x-modal>

            {{-- Large --}}
            <x-modal id="largeModal" title="Large Modal" size="lg">
                <p>This is a large modal with more space for content.</p>
            </x-modal>

            {{-- Extra Large --}}
            <x-modal id="extraLargeModal" title="Extra Large Modal" size="xl">
                <p>This is an extra large modal with even more space.</p>
            </x-modal>
        </div>
    </div>

    {{-- Scrollable Modal --}}
    <div class="example-section">
        <h2 class="example-title">Scrollable Modal</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                Launch Scrollable Modal
            </button>

            <x-modal id="scrollableModal" title="Scrollable Modal" :scrollable="true">
                <p>This modal has a lot of content that will scroll within the modal body.</p>
                @for($i = 1; $i <= 20; $i++)
                    <p>Paragraph {{ $i }}: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                @endfor

                <x-slot:footer>
                    <x-btn variant="secondary" data-bs-dismiss="modal">Close</x-btn>
                </x-slot:footer>
            </x-modal>
        </div>
    </div>

    {{-- Centered Modal --}}
    <div class="example-section">
        <h2 class="example-title">Vertically Centered Modal</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#centeredModal">
                Launch Centered Modal
            </button>

            <x-modal id="centeredModal" title="Centered Modal" :centered="true">
                <p>This modal is vertically centered on the page.</p>
            </x-modal>
        </div>
    </div>

    {{-- Modal with List Content --}}
    <div class="example-section">
        <h2 class="example-title">Modal with List Content</h2>

        <div class="demo-block">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#listModal">
                Launch List Modal
            </button>

            <x-modal id="listModal" title="Feature List">
                <h6>Package Features:</h6>
                <ul>
                    <li>44 pre-built components</li>
                    <li>Bootstrap 4 and 5 support</li>
                    <li>Automatic validation integration</li>
                    <li>Old value persistence</li>
                    <li>Icon support</li>
                    <li>Customizable via configuration</li>
                    <li>Easy to extend</li>
                </ul>

                <x-slot:footer>
                    <x-btn variant="primary" data-bs-dismiss="modal">Got it!</x-btn>
                </x-slot:footer>
            </x-modal>
        </div>
    </div>

    {{-- Code Examples --}}
    <div class="example-section">
        <h2 class="example-title">Code Examples</h2>

        <div class="code-example">
            <h6>Basic Modal</h6>
            <pre><code>&lt;!-- Trigger button --&gt;
&lt;button type="button" data-bs-toggle="modal" data-bs-target="#myModal"&gt;
    Launch Modal
&lt;/button&gt;

&lt;!-- Modal --&gt;
&lt;x-modal id="myModal" title="Modal Title"&gt;
    Modal content goes here.
&lt;/x-modal&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Modal with Custom Footer</h6>
            <pre><code>&lt;x-modal id="myModal" title="Modal Title"&gt;
    Content here.

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="secondary" data-bs-dismiss="modal"&gt;Cancel&lt;/x-btn&gt;
        &lt;x-btn variant="primary"&gt;Save&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Form Modal</h6>
            <pre><code>&lt;x-form-modal id="createModal" title="Create Item" action="/items"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="title"&gt;Title&lt;/x-label&gt;
        &lt;x-input name="title" id="title" /&gt;
    &lt;/div&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="secondary" data-bs-dismiss="modal"&gt;Cancel&lt;/x-btn&gt;
        &lt;x-btn type="submit" variant="primary"&gt;Create&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-form-modal&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Confirm Modal</h6>
            <pre><code>&lt;!-- Trigger button --&gt;
&lt;button type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete"&gt;
    Delete
&lt;/button&gt;

&lt;!-- Confirm modal --&gt;
&lt;x-confirm-modal
    id="confirmDelete"
    title="Confirm Delete"
    message="Are you sure you want to delete this item?"
    url="/items/1"
    method="DELETE"
/&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Custom Confirm Modal</h6>
            <pre><code>&lt;x-confirm-modal
    id="customConfirm"
    title="Archive Item"
    message="Do you want to archive this?"
    url="/items/1/archive"
    method="PATCH"
    yes-text="Yes, Archive"
    no-text="No, Keep It"
    yes-variant="warning"
/&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Modal Sizes</h6>
            <pre><code>&lt;x-modal id="smallModal" title="Small" size="sm"&gt;...&lt;/x-modal&gt;
&lt;x-modal id="defaultModal" title="Default"&gt;...&lt;/x-modal&gt;
&lt;x-modal id="largeModal" title="Large" size="lg"&gt;...&lt;/x-modal&gt;
&lt;x-modal id="xlModal" title="Extra Large" size="xl"&gt;...&lt;/x-modal&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Scrollable and Centered</h6>
            <pre><code>&lt;x-modal id="scrollable" title="Scrollable" :scrollable="true"&gt;
    Long content...
&lt;/x-modal&gt;

&lt;x-modal id="centered" title="Centered" :centered="true"&gt;
    Content...
&lt;/x-modal&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Non-Dismissible Modal</h6>
            <pre><code>&lt;x-modal id="myModal" title="Important" :dismissable="false"&gt;
    This modal cannot be dismissed by clicking outside.

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="primary" data-bs-dismiss="modal"&gt;OK&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;</code></pre>
        </div>
    </div>
@endsection
