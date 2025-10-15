@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Form Components')

@section('content')
    {{-- Label Component --}}
    <div class="example-section" id="section-label">
        <h2 class="example-title">Label Component</h2>

        <h5 class="mt-3">Basic Label</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-label-basic">
            <x-label for="first_name" />
            <x-input name="first_name" id="first_name" />

            <x-slot:code>
&lt;x-label for="first_name" /&gt;
&lt;x-input name="first_name" id="first_name" /&gt;

&lt;!-- The label text is auto-generated: "first_name" becomes "First name" --&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
        <p class="text-muted">
            <small>The label text is automatically generated from the 'for' attribute: "first_name" becomes "First name".</small>
        </p>

        <h5 class="mt-3">Label with Custom Content</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-label-custom">
            <x-label for="custom">
                Custom Label <span class="text-danger">*</span>
            </x-label>
            <x-input name="custom" id="custom" />

            <x-slot:code>
&lt;x-label for="custom"&gt;
    Custom Label &lt;span class="text-danger"&gt;*&lt;/span&gt;
&lt;/x-label&gt;
&lt;x-input name="custom" id="custom" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Error Component --}}
    <div class="example-section" id="section-error">
        <h2 class="example-title">Error Component</h2>

        <div class="alert alert-info">
            <strong>Note:</strong> Error messages are displayed when validation errors exist.
            In this demo, we'll simulate the appearance of error messages.
        </div>

        <h5 class="mt-3">Simulated Error Display</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-error-simulated">
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

            <x-slot:code>
&lt;div class="mb-3"&gt;
    &lt;x-label for="email"&gt;Email&lt;/x-label&gt;
    &lt;input type="email" class="form-control is-invalid" id="email" name="email"&gt;
    &lt;div class="invalid-feedback"&gt;
        The email field must be a valid email address.
    &lt;/div&gt;
&lt;/div&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Error Component Usage</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-error-component">
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

            <x-slot:code>
&lt;div class="mb-3"&gt;
    &lt;x-label for="username"&gt;Username&lt;/x-label&gt;
    &lt;x-input name="username" id="username" /&gt;
    &lt;x-error field="username" /&gt;
&lt;/div&gt;

&lt;div class="mb-3"&gt;
    &lt;x-label for="email"&gt;Email&lt;/x-label&gt;
    &lt;x-email name="email" id="email" /&gt;
    &lt;x-error field="email" /&gt;
&lt;/div&gt;

&lt;!-- With custom error bag --&gt;
&lt;x-error field="email" bag="customBag" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
        <p class="text-muted">
            <small>The <code>&lt;x-error&gt;</code> component automatically displays validation errors when they exist.</small>
        </p>
    </div>

    {{-- Complete Form Example --}}
    <div class="example-section" id="section-complete">
        <h2 class="example-title">Complete Form Example</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-complete">
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

                <div class="form-check mb-3">
                    <x-checkbox name="terms" label="I agree to the terms and conditions" />
                    <x-error field="terms" />
                </div>

                <div class="d-flex gap-2">
                    <x-btn type="submit" variant="primary">Submit</x-btn>
                    <x-btn type="reset" variant="secondary">Reset</x-btn>
                </div>
            </x-form>

            <x-slot:code>
&lt;x-form action="/register"&gt;
    &lt;div class="row mb-3"&gt;
        &lt;div class="col-md-6"&gt;
            &lt;x-label for="first_name"&gt;First name&lt;/x-label&gt;
            &lt;x-input name="first_name" id="first_name" /&gt;
            &lt;x-error field="first_name" /&gt;
        &lt;/div&gt;
        &lt;div class="col-md-6"&gt;
            &lt;x-label for="last_name"&gt;Last name&lt;/x-label&gt;
            &lt;x-input name="last_name" id="last_name" /&gt;
            &lt;x-error field="last_name" /&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="email"&gt;Email&lt;/x-label&gt;
        &lt;x-email name="email" id="email" /&gt;
        &lt;x-error field="email" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="password"&gt;Password&lt;/x-label&gt;
        &lt;x-password name="password" id="password" /&gt;
        &lt;x-error field="password" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="bio"&gt;Bio&lt;/x-label&gt;
        &lt;x-textarea name="bio" id="bio" rows="3" /&gt;
        &lt;x-error field="bio" /&gt;
    &lt;/div&gt;

    &lt;div class="form-check mb-3"&gt;
        &lt;x-checkbox name="terms" label="I agree to the terms and conditions" /&gt;
        &lt;x-error field="terms" /&gt;
    &lt;/div&gt;

    &lt;div class="d-flex gap-2"&gt;
        &lt;x-btn type="submit" variant="primary"&gt;Submit&lt;/x-btn&gt;
        &lt;x-btn type="reset" variant="secondary"&gt;Reset&lt;/x-btn&gt;
    &lt;/div&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-label', 'title' => 'Label Component'],
        ['id' => 'section-error', 'title' => 'Error Component'],
        ['id' => 'section-complete', 'title' => 'Complete Form Example'],
    ]" />
@endsection
