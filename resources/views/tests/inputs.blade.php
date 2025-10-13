@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Inputs')

@section('content')
    {{-- Generic Input --}}
    <div class="example-section">
        <h2 class="example-title">Generic Input</h2>

        <h5 class="mt-3">Basic Input</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="basic_input">Basic Input</x-label>
                <x-input name="basic_input" id="basic_input" />
            </div>
        </div>

        <h5 class="mt-3">Input with Value</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="input_with_value">Input with Value</x-label>
                <x-input name="input_with_value" id="input_with_value" value="Pre-filled value" />
            </div>
        </div>

        <h5 class="mt-3">Input with Placeholder</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="input_placeholder">Input with Placeholder</x-label>
                <x-input name="input_placeholder" id="input_placeholder" placeholder="Enter your text here" />
            </div>
        </div>

        <h5 class="mt-3">Different Input Types</h5>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Text Input --}}
    <div class="example-section">
        <h2 class="example-title">Text Input</h2>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="text_input">Text Input</x-label>
                <x-text name="text_input" id="text_input" placeholder="Enter text" />
            </div>
        </div>
    </div>

    {{-- Email Input --}}
    <div class="example-section">
        <h2 class="example-title">Email Input</h2>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="email_input">Email Address</x-label>
                <x-email name="email_input" id="email_input" placeholder="user@example.com" />
            </div>
        </div>
    </div>

    {{-- Password Input --}}
    <div class="example-section">
        <h2 class="example-title">Password Input</h2>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Date Input --}}
    <div class="example-section">
        <h2 class="example-title">Date Input</h2>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="date_input">Date</x-label>
                    <x-date name="date_input" id="date_input" />
                </div>

                <div class="mb-3">
                    <x-label for="date_with_value">Date with Value</x-label>
                    <x-date name="date_with_value" id="date_with_value" value="2025-01-15" />
                </div>
            </div>
        </div>
    </div>

    {{-- Time Input --}}
    <div class="example-section">
        <h2 class="example-title">Time Input</h2>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="time_input">Time</x-label>
                    <x-time name="time_input" id="time_input" />
                </div>

                <div class="mb-3">
                    <x-label for="time_with_value">Time with Value</x-label>
                    <x-time name="time_with_value" id="time_with_value" value="14:30" />
                </div>
            </div>
        </div>
    </div>

    {{-- Textarea --}}
    <div class="example-section">
        <h2 class="example-title">Textarea</h2>

        <h5 class="mt-3">Basic Textarea</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="textarea_basic">Description</x-label>
                <x-textarea name="textarea_basic" id="textarea_basic" />
            </div>
        </div>

        <h5 class="mt-3">Textarea with Rows</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="textarea_rows">Comments (5 rows)</x-label>
                <x-textarea name="textarea_rows" id="textarea_rows" rows="5" />
            </div>
        </div>

        <h5 class="mt-3">Textarea with Value</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="textarea_value">Bio</x-label>
                <x-textarea name="textarea_value" id="textarea_value" rows="4">This is a pre-filled textarea with some content.</x-textarea>
            </div>
        </div>

        <h5 class="mt-3">Textarea with Placeholder</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="textarea_placeholder">Notes</x-label>
                <x-textarea name="textarea_placeholder" id="textarea_placeholder" placeholder="Enter your notes here..." rows="3" />
            </div>
        </div>
    </div>

    {{-- Select --}}
    <div class="example-section">
        <h2 class="example-title">Select</h2>

        <h5 class="mt-3">Basic Select</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="select_basic">Country</x-label>
                <x-select name="select_basic" id="select_basic">
                    <option value="">Select a country</option>
                    <option value="us">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="ca">Canada</option>
                    <option value="au">Australia</option>
                    <option value="fr">France</option>
                </x-select>
            </div>
        </div>

        <h5 class="mt-3">Select with Selected Value</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="select_selected">Status</x-label>
                <x-select name="select_selected" id="select_selected">
                    <option value="draft">Draft</option>
                    <option value="published" selected>Published</option>
                    <option value="archived">Archived</option>
                </x-select>
            </div>
        </div>

        <h5 class="mt-3">Select with Grouped Options</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="select_grouped">Vehicle Type</x-label>
                <x-select name="select_grouped" id="select_grouped">
                    <option value="">Select a vehicle</option>
                    <optgroup label="Cars">
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="coupe">Coupe</option>
                    </optgroup>
                    <optgroup label="Motorcycles">
                        <option value="sport">Sport</option>
                        <option value="cruiser">Cruiser</option>
                        <option value="touring">Touring</option>
                    </optgroup>
                </x-select>
            </div>
        </div>

        <h5 class="mt-3">Multiple Select</h5>
        <div class="demo-block">
            <div style="max-width: 500px;">
                <x-label for="select_multiple">Select Multiple Options</x-label>
                <x-select name="select_multiple[]" id="select_multiple" multiple>
                    <option value="php">PHP</option>
                    <option value="javascript">JavaScript</option>
                    <option value="python">Python</option>
                    <option value="ruby">Ruby</option>
                    <option value="go">Go</option>
                </x-select>
            </div>
        </div>
    </div>

    {{-- Checkbox --}}
    <div class="example-section">
        <h2 class="example-title">Checkbox</h2>

        <h5 class="mt-3">Basic Checkbox</h5>
        <div class="demo-block">
            <x-checkbox name="terms" label="I agree to the terms and conditions" />
        </div>

        <h5 class="mt-3">Checked by Default</h5>
        <div class="demo-block">
            <x-checkbox name="newsletter" label="Subscribe to newsletter" :checked="true" />
        </div>

        <h5 class="mt-3">Custom Value</h5>
        <div class="demo-block">
            <x-checkbox name="status" label="Active" value="active" />
        </div>

        <h5 class="mt-3">Multiple Checkboxes</h5>
        <div class="demo-block">
            <div>
                <p class="fw-bold mb-2">Select your interests:</p>
                <x-checkbox name="interests[]" value="coding" label="Coding" />
                <x-checkbox name="interests[]" value="design" label="Design" />
                <x-checkbox name="interests[]" value="marketing" label="Marketing" />
                <x-checkbox name="interests[]" value="writing" label="Writing" />
            </div>
        </div>

        <h5 class="mt-3">Checkbox with HTML Label</h5>
        <div class="demo-block">
            <x-checkbox name="privacy" label="I accept the <a href='#'>privacy policy</a>" />
        </div>
    </div>

    {{-- Hidden Input --}}
    <div class="example-section">
        <h2 class="example-title">Hidden Input</h2>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Validation States --}}
    <div class="example-section">
        <h2 class="example-title">Validation States</h2>

        <div class="alert alert-info">
            <strong>Note:</strong> Input components automatically display validation errors when they exist.
            This demo simulates the appearance with the <code>is-invalid</code> class.
        </div>

        <div class="demo-block">
            <div style="max-width: 500px;">
                <div class="mb-3">
                    <x-label for="valid_input">Valid Input</x-label>
                    <input type="text" class="form-control is-valid" id="valid_input" value="Valid value">
                    <div class="valid-feedback" style="display: block;">
                        Looks good!
                    </div>
                </div>

                <div class="mb-3">
                    <x-label for="invalid_email">Invalid Email</x-label>
                    <input type="email" class="form-control is-invalid" id="invalid_email" value="not-an-email">
                    <div class="invalid-feedback" style="display: block;">
                        Please provide a valid email address.
                    </div>
                </div>

                <div class="mb-3">
                    <x-label for="invalid_password">Invalid Password</x-label>
                    <input type="password" class="form-control is-invalid" id="invalid_password">
                    <div class="invalid-feedback" style="display: block;">
                        Password must be at least 8 characters.
                    </div>
                </div>

                <div class="mb-3">
                    <x-label for="invalid_select">Invalid Select</x-label>
                    <select class="form-select is-invalid" id="invalid_select">
                        <option value="">Select an option</option>
                        <option value="1">Option 1</option>
                    </select>
                    <div class="invalid-feedback" style="display: block;">
                        Please select an option.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Complete Form Example --}}
    <div class="example-section">
        <h2 class="example-title">Complete Form with All Input Types</h2>
        <div class="demo-block">
            <x-form action="#" style="max-width: 700px;">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <x-label for="full_name">Full Name</x-label>
                        <x-text name="full_name" id="full_name" />
                    </div>
                    <div class="col-md-6">
                        <x-label for="email_complete">Email</x-label>
                        <x-email name="email" id="email_complete" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <x-label for="password_complete">Password</x-label>
                        <x-password name="password" id="password_complete" />
                    </div>
                    <div class="col-md-6">
                        <x-label for="phone">Phone</x-label>
                        <x-input type="tel" name="phone" id="phone" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <x-label for="birthdate">Birth Date</x-label>
                        <x-date name="birthdate" id="birthdate" />
                    </div>
                    <div class="col-md-6">
                        <x-label for="meeting_time">Meeting Time</x-label>
                        <x-time name="meeting_time" id="meeting_time" />
                    </div>
                </div>

                <div class="mb-3">
                    <x-label for="country_select">Country</x-label>
                    <x-select name="country" id="country_select">
                        <option value="">Select a country</option>
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="ca">Canada</option>
                    </x-select>
                </div>

                <div class="mb-3">
                    <x-label for="bio_complete">Bio</x-label>
                    <x-textarea name="bio" id="bio_complete" rows="4" />
                </div>

                <div class="mb-3">
                    <x-checkbox name="newsletter_complete" label="Subscribe to newsletter" />
                    <x-checkbox name="terms_complete" label="I agree to terms and conditions" />
                </div>

                <x-hidden name="form_id" value="registration" />

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
            <h6>Basic Input</h6>
            <pre><code>&lt;x-input name="username" placeholder="Enter username" /&gt;
&lt;x-text name="full_name" value="John Doe" /&gt;
&lt;x-email name="email" /&gt;
&lt;x-password name="password" /&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Date and Time</h6>
            <pre><code>&lt;x-date name="birthdate" /&gt;
&lt;x-time name="appointment" value="14:30" /&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Textarea</h6>
            <pre><code>&lt;x-textarea name="description" rows="5" placeholder="Enter description" /&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Select</h6>
            <pre><code>&lt;x-select name="country"&gt;
    &lt;option value=""&gt;Select&lt;/option&gt;
    &lt;option value="us"&gt;United States&lt;/option&gt;
    &lt;option value="uk"&gt;United Kingdom&lt;/option&gt;
&lt;/x-select&gt;

&lt;!-- Multiple select --&gt;
&lt;x-select name="languages[]" multiple&gt;
    &lt;option value="php"&gt;PHP&lt;/option&gt;
    &lt;option value="js"&gt;JavaScript&lt;/option&gt;
&lt;/x-select&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Checkbox</h6>
            <pre><code>&lt;x-checkbox name="terms" label="I agree" /&gt;
&lt;x-checkbox name="status" label="Active" value="active" :checked="true" /&gt;
&lt;x-checkbox name="interests[]" value="coding" label="Coding" /&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Hidden Input</h6>
            <pre><code>&lt;x-hidden name="user_id" value="123" /&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>With Validation</h6>
            <pre><code>&lt;x-label for="email"&gt;Email&lt;/x-label&gt;
&lt;x-email name="email" id="email" /&gt;
&lt;x-error field="email" /&gt;</code></pre>
        </div>
    </div>
@endsection
