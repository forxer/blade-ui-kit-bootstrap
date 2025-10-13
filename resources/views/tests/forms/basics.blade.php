@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Form Basics')

@section('content')
    {{-- Table of Contents --}}
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-basic', 'title' => 'Basic Form'],
        ['id' => 'section-methods', 'title' => 'Form Methods'],
        ['id' => 'section-files', 'title' => 'Form with File Upload'],
        ['id' => 'section-validation', 'title' => 'Form with Browser Validation'],
    ]" />

    {{-- Basic Form --}}
    <div class="example-section" id="section-basic">
        <h2 class="example-title">Basic Form</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-basic">
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

            <x-slot:code>
&lt;x-form action="/submit"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="name"&gt;Name&lt;/x-label&gt;
        &lt;x-input name="name" id="name" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="email"&gt;Email&lt;/x-label&gt;
        &lt;x-email name="email" id="email" /&gt;
    &lt;/div&gt;

    &lt;x-btn type="submit" variant="primary"&gt;Submit&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Form with Different Methods --}}
    <div class="example-section" id="section-methods">
        <h2 class="example-title">Form Methods</h2>

        <h5 class="mt-3">POST Form (Default)</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-post">
            <x-form action="#" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username">Username</x-label>
                    <x-input name="username" id="username" />
                </div>
                <x-btn type="submit" variant="primary">Create</x-btn>
            </x-form>

            <x-slot:code>
&lt;x-form action="/posts"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="username"&gt;Username&lt;/x-label&gt;
        &lt;x-input name="username" id="username" /&gt;
    &lt;/div&gt;
    &lt;x-btn type="submit" variant="primary"&gt;Create&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">PUT Form</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-put">
            <x-form action="#" method="PUT" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username_put">Username</x-label>
                    <x-input name="username" id="username_put" />
                </div>
                <x-btn type="submit" variant="warning">Update</x-btn>
            </x-form>

            <x-slot:code>
&lt;x-form action="/posts/1" method="PUT"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="username"&gt;Username&lt;/x-label&gt;
        &lt;x-input name="username" id="username" /&gt;
    &lt;/div&gt;
    &lt;x-btn type="submit" variant="warning"&gt;Update&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">PATCH Form</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-patch">
            <x-form action="#" method="PATCH" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="username_patch">Username</x-label>
                    <x-input name="username" id="username_patch" />
                </div>
                <x-btn type="submit" variant="info">Patch</x-btn>
            </x-form>

            <x-slot:code>
&lt;x-form action="/posts/1" method="PATCH"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="username"&gt;Username&lt;/x-label&gt;
        &lt;x-input name="username" id="username" /&gt;
    &lt;/div&gt;
    &lt;x-btn type="submit" variant="info"&gt;Patch&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">DELETE Form</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-delete">
            <x-form action="#" method="DELETE" style="max-width: 500px;">
                <p>Are you sure you want to delete this item?</p>
                <x-btn type="submit" variant="danger">Delete</x-btn>
            </x-form>

            <x-slot:code>
&lt;x-form action="/posts/1" method="DELETE"&gt;
    &lt;p&gt;Are you sure you want to delete this item?&lt;/p&gt;
    &lt;x-btn type="submit" variant="danger"&gt;Delete&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">GET Form</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-get">
            <x-form action="#" method="GET" style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="search">Search</x-label>
                    <x-input name="q" id="search" />
                </div>
                <x-btn type="submit" variant="primary">Search</x-btn>
            </x-form>

            <x-slot:code>
&lt;x-form action="/search" method="GET"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="search"&gt;Search&lt;/x-label&gt;
        &lt;x-input name="q" id="search" /&gt;
    &lt;/div&gt;
    &lt;x-btn type="submit" variant="primary"&gt;Search&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Form with File Upload --}}
    <div class="example-section" id="section-files">
        <h2 class="example-title">Form with File Upload</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-files">
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

            <x-slot:code>
&lt;x-form action="/upload" has-files&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="title"&gt;Title&lt;/x-label&gt;
        &lt;x-input name="title" id="title" /&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;label for="file" class="form-label"&gt;Upload File&lt;/label&gt;
        &lt;input type="file" class="form-control" id="file" name="file"&gt;
    &lt;/div&gt;

    &lt;x-btn type="submit" variant="primary"&gt;Upload&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Form without novalidate --}}
    <div class="example-section" id="section-validation">
        <h2 class="example-title">Form with Browser Validation</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-form-validation">
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

            <x-slot:code>
&lt;x-form action="/submit" :novalidate="false"&gt;
    &lt;div class="mb-3"&gt;
        &lt;x-label for="email"&gt;Email (Required)&lt;/x-label&gt;
        &lt;input type="email" class="form-control" id="email" name="email" required&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;x-label for="url"&gt;URL&lt;/x-label&gt;
        &lt;input type="url" class="form-control" id="url" name="url"&gt;
    &lt;/div&gt;

    &lt;x-btn type="submit" variant="primary"&gt;Submit&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
        <p class="text-muted">
            <small>This form uses browser validation (novalidate=false).</small>
        </p>
    </div>
@endsection
