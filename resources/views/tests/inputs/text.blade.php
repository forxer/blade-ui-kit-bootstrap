@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Text Inputs')

@section('content')
    {{-- Generic Input --}}
    <div class="example-section" id="section-generic">
        <h2 class="example-title">Generic Input</h2>

        <h5 class="mt-3">Basic Input</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-input-basic">
            <div style="max-width: 500px;">
                <x-label for="basic_input">Basic Input</x-label>
                <x-input name="basic_input" id="basic_input" />
            </div>

            <x-slot:code>
&lt;x-label for="basic_input"&gt;Basic Input&lt;/x-label&gt;
&lt;x-input name="basic_input" id="basic_input" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Input with Value</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-input-value">
            <div style="max-width: 500px;">
                <x-label for="input_with_value">Input with Value</x-label>
                <x-input name="input_with_value" id="input_with_value" value="Pre-filled value" />
            </div>

            <x-slot:code>
&lt;x-input name="input_with_value" id="input_with_value" value="Pre-filled value" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Input with Placeholder</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-input-placeholder">
            <div style="max-width: 500px;">
                <x-label for="input_placeholder">Input with Placeholder</x-label>
                <x-input name="input_placeholder" id="input_placeholder" placeholder="Enter your text here" />
            </div>

            <x-slot:code>
&lt;x-input name="input_placeholder" id="input_placeholder" placeholder="Enter your text here" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Different Input Types</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-input-types">
            <div style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="input_text">Text</x-label>
                    <x-input type="text" name="input_text" id="input_text" />
                </div>

                <div class="mb-3">
                    <x-label for="input_number">Number</x-label>
                    <x-input type="number" name="input_number" id="input_number" />
                </div>

                <div class="mb-3">
                    <x-label for="input_url">URL</x-label>
                    <x-input type="url" name="input_url" id="input_url" placeholder="https://example.com" />
                </div>

                <div class="mb-3">
                    <x-label for="input_tel">Tel</x-label>
                    <x-input type="tel" name="input_tel" id="input_tel" placeholder="+1234567890" />
                </div>
            </div>

            <x-slot:code>
&lt;x-input type="text" name="input_text" id="input_text" /&gt;
&lt;x-input type="number" name="input_number" id="input_number" /&gt;
&lt;x-input type="url" name="input_url" id="input_url" placeholder="https://example.com" /&gt;
&lt;x-input type="tel" name="input_tel" id="input_tel" placeholder="+1234567890" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Text Input --}}
    <div class="example-section" id="section-text">
        <h2 class="example-title">Text Input</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-text">
            <div style="max-width: 500px;">
                <x-label for="text_input">Text Input</x-label>
                <x-text name="text_input" id="text_input" placeholder="Enter text" />
            </div>

            <x-slot:code>
&lt;x-text name="text_input" id="text_input" placeholder="Enter text" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Email Input --}}
    <div class="example-section" id="section-email">
        <h2 class="example-title">Email Input</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-email">
            <div style="max-width: 500px;">
                <x-label for="email_input">Email Address</x-label>
                <x-email name="email_input" id="email_input" placeholder="user@example.com" />
            </div>

            <x-slot:code>
&lt;x-email name="email_input" id="email_input" placeholder="user@example.com" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Password Input --}}
    <div class="example-section" id="section-password">
        <h2 class="example-title">Password Input</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-password">
            <div style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="password_input">Password</x-label>
                    <x-password name="password_input" id="password_input" />
                </div>

                <div class="mb-3">
                    <x-label for="password_confirm">Confirm Password</x-label>
                    <x-password name="password_confirm" id="password_confirm" />
                </div>
            </div>

            <x-slot:code>
&lt;x-label for="password"&gt;Password&lt;/x-label&gt;
&lt;x-password name="password" id="password" /&gt;

&lt;x-label for="password_confirm"&gt;Confirm Password&lt;/x-label&gt;
&lt;x-password name="password_confirm" id="password_confirm" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Hidden Input --}}
    <div class="example-section" id="section-hidden">
        <h2 class="example-title">Hidden Input</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-hidden">
            <div style="max-width: 500px;">
                <div class="alert alert-info">
                    Hidden inputs are not visible in the UI but are included in form submissions.
                </div>
                <x-form action="#">
                    <x-hidden name="user_id" value="123" />
                    <x-hidden name="token" value="abc123xyz" />

                    <x-label for="visible_field">Visible Field</x-label>
                    <x-input name="visible_field" id="visible_field" />

                    <x-btn type="submit" variant="primary" class="mt-3">Submit</x-btn>
                </x-form>
            </div>

            <x-slot:code>
&lt;x-form action="/submit"&gt;
    &lt;x-hidden name="user_id" value="123" /&gt;
    &lt;x-hidden name="token" value="abc123xyz" /&gt;

    &lt;x-label for="visible_field"&gt;Visible Field&lt;/x-label&gt;
    &lt;x-input name="visible_field" id="visible_field" /&gt;

    &lt;x-btn type="submit" variant="primary"&gt;Submit&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-generic', 'title' => 'Generic Input'],
        ['id' => 'section-text', 'title' => 'Text Input'],
        ['id' => 'section-email', 'title' => 'Email Input'],
        ['id' => 'section-password', 'title' => 'Password Input'],
        ['id' => 'section-hidden', 'title' => 'Hidden Input'],
    ]" />
@endsection
