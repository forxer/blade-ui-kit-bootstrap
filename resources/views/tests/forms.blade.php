@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Forms')

@section('content')
    {{-- Basic Form --}}
    <div class="example-section">
        <h2 class="example-title">Basic Form</h2>
        <div class="demo-block">
            <x-form action="#" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="name">Name</x-label>
                    <x-input name="name" id="name" />
                </div>

                <div class="mb-3">
                    <x-label for="email">Email</x-label>
                    <x-email name="email" id="email" />
                </div>

                <x-btn type="submit" variant="primary">Submit</x-btn>
            </x-form>
        </div>
    </div>

    {{-- Form with Different Methods --}}
    <div class="example-section">
        <h2 class="example-title">Form Methods</h2>

        <h5 class="mt-3">POST Form (Default)</h5>
        <div class="demo-block">
            <x-form action="#" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username">Username</x-label>
                    <x-input name="username" id="username" />
                </div>
                <x-btn type="submit" variant="primary">Create</x-btn>
            </x-form>
        </div>

        <h5 class="mt-3">PUT Form</h5>
        <div class="demo-block">
            <x-form action="#" method="PUT" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username_put">Username</x-label>
                    <x-input name="username" id="username_put" />
                </div>
                <x-btn type="submit" variant="warning">Update</x-btn>
            </x-form>
        </div>

        <h5 class="mt-3">PATCH Form</h5>
        <div class="demo-block">
            <x-form action="#" method="PATCH" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username_patch">Username</x-label>
                    <x-input name="username" id="username_patch" />
                </div>
                <x-btn type="submit" variant="info">Patch</x-btn>
            </x-form>
        </div>

        <h5 class="mt-3">DELETE Form</h5>
        <div class="demo-block">
            <x-form action="#" method="DELETE" style="max-width: 500px;">
                <p>Are you sure you want to delete this item?</p>
                <x-btn type="submit" variant="danger">Delete</x-btn>
            </x-form>
        </div>

        <h5 class="mt-3">GET Form</h5>
        <div class="demo-block">
            <x-form action="#" method="GET" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="search">Search</x-label>
                    <x-input name="q" id="search" />
                </div>
                <x-btn type="submit" variant="primary">Search</x-btn>
            </x-form>
        </div>
    </div>

    {{-- Form with File Upload --}}
    <div class="example-section">
        <h2 class="example-title">Form with File Upload</h2>
        <div class="demo-block">
            <x-form action="#" has-files style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="title">Title</x-label>
                    <x-input name="title" id="title" />
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Upload File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>

                <x-btn type="submit" variant="primary">Upload</x-btn>
            </x-form>
        </div>
    </div>

    {{-- Form without novalidate --}}
    <div class="example-section">
        <h2 class="example-title">Form with Browser Validation</h2>
        <div class="demo-block">
            <x-form action="#" :novalidate="false" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="email_required">Email (Required)</x-label>
                    <input type="email" class="form-control" id="email_required" name="email" required>
                </div>

                <div class="mb-3">
                    <x-label for="url">URL</x-label>
                    <input type="url" class="form-control" id="url" name="url">
                </div>

                <x-btn type="submit" variant="primary">Submit</x-btn>
            </x-form>
        </div>
        <p class="text-muted">
            <small>This form uses browser validation (novalidate=false).</small>
        </p>
    </div>

    {{-- Label Component --}}
    <div class="example-section">
        <h2 class="example-title">Label Component</h2>

        <h5 class="mt-3">Basic Label</h5>
        <div class="demo-block">
            <x-label for="first_name" />
            <x-input name="first_name" id="first_name" />
        </div>
        <p class="text-muted">
            <small>The label text is automatically generated from the 'for' attribute: "first_name" becomes "First name".</small>
        </p>

        <h5 class="mt-3">Label with Custom Content</h5>
        <div class="demo-block">
            <x-label for="custom">
                Custom Label <span class="text-danger">*</span>
            </x-label>
            <x-input name="custom" id="custom" />
        </div>
    </div>

    {{-- Error Component --}}
    <div class="example-section">
        <h2 class="example-title">Error Component</h2>

        <div class="alert alert-info">
            <strong>Note:</strong> Error messages are displayed when validation errors exist.
            In this demo, we'll simulate the appearance of error messages.
        </div>

        <h5 class="mt-3">Simulated Error Display</h5>
        <div class="demo-block">
            <div class="mb-3">
                <x-label for="email_error">Email</x-label>
                <input type="email" class="form-control is-invalid" id="email_error" name="email" value="invalid-email">
                <div class="invalid-feedback" style="display: block;">
                    The email field must be a valid email address.
                </div>
            </div>

            <div class="mb-3">
                <x-label for="password_error">Password</x-label>
                <input type="password" class="form-control is-invalid" id="password_error" name="password">
                <div class="invalid-feedback" style="display: block;">
                    The password field is required.
                </div>
            </div>
        </div>

        <h5 class="mt-3">Error Component Usage</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username_demo">Username</x-label>
                    <x-input name="username" id="username_demo" />
                    <x-error field="username" />
                </div>

                <div class="mb-3">
                    <x-label for="email_demo">Email</x-label>
                    <x-email name="email" id="email_demo" />
                    <x-error field="email" />
                </div>
            </div>
        </div>
        <p class="text-muted">
            <small>The <code>&lt;x-error&gt;</code> component automatically displays validation errors when they exist.</small>
        </p>
    </div>

    {{-- Complete Form Example --}}
    <div class="example-section">
        <h2 class="example-title">Complete Form Example</h2>
        <div class="demo-block">
            <x-form action="#" style="max-width: 600px;">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <x-label for="first_name_complete">First name</x-label>
                        <x-input name="first_name" id="first_name_complete" />
                        <x-error field="first_name" />
                    </div>
                    <div class="col-md-6">
                        <x-label for="last_name_complete">Last name</x-label>
                        <x-input name="last_name" id="last_name_complete" />
                        <x-error field="last_name" />
                    </div>
                </div>

                <div class="mb-3">
                    <x-label for="email_complete">Email</x-label>
                    <x-email name="email" id="email_complete" />
                    <x-error field="email" />
                </div>

                <div class="mb-3">
                    <x-label for="password_complete">Password</x-label>
                    <x-password name="password" id="password_complete" />
                    <x-error field="password" />
                </div>

                <div class="mb-3">
                    <x-label for="bio">Bio</x-label>
                    <x-textarea name="bio" id="bio" rows="3" />
                    <x-error field="bio" />
                </div>

                <div class="mb-3">
                    <x-checkbox name="terms" label="I agree to the terms and conditions" />
                    <x-error field="terms" />
                </div>

                <div class="d-flex gap-2">
                    <x-btn type="submit" variant="primary">Submit</x-btn>
                    <x-btn type="reset" variant="secondary">Reset</x-btn>
                </div>
            </x-form>
        </div>
    </div>

    {{-- Code Examples --}}
    <div class="example-section">
        <h2 class="example-title">Code Examples</h2>

        <div class="code-example">
            <h6>Basic Form</h6>
            <pre><code>&lt;x-form action="/submit"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="name"&gt;Name&lt;/x-label&gt;
        &lt;x-input name="name" id="name" /&gt;
        &lt;x-error field="name" /&gt;
    &lt;/div&gt;

    &lt;x-btn type="submit" variant="primary"&gt;Submit&lt;/x-btn&gt;
&lt;/x-form&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Form with Different Method</h6>
            <pre><code>&lt;x-form action="/posts/1" method="PUT"&gt;
    &lt;!-- Form fields --&gt;
&lt;/x-form&gt;

&lt;x-form action="/posts/1" method="DELETE"&gt;
    &lt;!-- Confirmation --&gt;
&lt;/x-form&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Form with File Upload</h6>
            <pre><code>&lt;x-form action="/upload" has-files&gt;
    &lt;input type="file" name="document" class="form-control"&gt;
    &lt;x-btn type="submit"&gt;Upload&lt;/x-btn&gt;
&lt;/x-form&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Auto-generated Label</h6>
            <pre><code>&lt;x-label for="first_name" /&gt;
&lt;!-- Renders: "First name" --&gt;

&lt;x-label for="email_address" /&gt;
&lt;!-- Renders: "Email address" --&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Error Display</h6>
            <pre><code>&lt;x-input name="email" /&gt;
&lt;x-error field="email" /&gt;

&lt;!-- With custom error bag --&gt;
&lt;x-error field="email" bag="customBag" /&gt;</code></pre>
        </div>
    </div>
@endsection
