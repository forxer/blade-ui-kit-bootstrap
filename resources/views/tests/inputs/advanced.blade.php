@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Advanced Inputs')

@section('content')
    {{-- Date Input --}}
    <div class="example-section" id="section-date">
        <h2 class="example-title">Date Input</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-date">
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

            <x-slot:code>
&lt;x-date name="date_input" id="date_input" /&gt;
&lt;x-date name="date_with_value" id="date_with_value" value="2025-01-15" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Time Input --}}
    <div class="example-section" id="section-time">
        <h2 class="example-title">Time Input</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-time">
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

            <x-slot:code>
&lt;x-time name="time_input" id="time_input" /&gt;
&lt;x-time name="time_with_value" id="time_with_value" value="14:30" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Textarea --}}
    <div class="example-section" id="section-textarea">
        <h2 class="example-title">Textarea</h2>

        <h5 class="mt-3">Basic Textarea</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-textarea-basic">
            <div style="max-width: 500px;">
                <x-label for="textarea_basic">Description</x-label>
                <x-textarea name="textarea_basic" id="textarea_basic" />
            </div>

            <x-slot:code>
&lt;x-textarea name="textarea_basic" id="textarea_basic" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Textarea with Rows</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-textarea-rows">
            <div style="max-width: 500px;">
                <x-label for="textarea_rows">Comments (5 rows)</x-label>
                <x-textarea name="textarea_rows" id="textarea_rows" rows="5" />
            </div>

            <x-slot:code>
&lt;x-textarea name="textarea_rows" id="textarea_rows" rows="5" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Textarea with Value</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-textarea-value">
            <div style="max-width: 500px;">
                <x-label for="textarea_value">Bio</x-label>
                <x-textarea name="textarea_value" id="textarea_value" rows="4">This is a pre-filled textarea with some content.</x-textarea>
            </div>

            <x-slot:code>
&lt;x-textarea name="textarea_value" id="textarea_value" rows="4"&gt;
    This is a pre-filled textarea with some content.
&lt;/x-textarea&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Textarea with Placeholder</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-textarea-placeholder">
            <div style="max-width: 500px;">
                <x-label for="textarea_placeholder">Notes</x-label>
                <x-textarea name="textarea_placeholder" id="textarea_placeholder" placeholder="Enter your notes here..." rows="3" />
            </div>

            <x-slot:code>
&lt;x-textarea name="textarea_placeholder" id="textarea_placeholder" placeholder="Enter your notes here..." rows="3" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Select --}}
    <div class="example-section" id="section-select">
        <h2 class="example-title">Select</h2>

        <h5 class="mt-3">Basic Select</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-select-basic">
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

            <x-slot:code>
&lt;x-select name="select_basic" id="select_basic"&gt;
    &lt;option value=""&gt;Select a country&lt;/option&gt;
    &lt;option value="us"&gt;United States&lt;/option&gt;
    &lt;option value="uk"&gt;United Kingdom&lt;/option&gt;
    &lt;option value="ca"&gt;Canada&lt;/option&gt;
&lt;/x-select&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Select with Selected Value</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-select-selected">
            <div style="max-width: 500px;">
                <x-label for="select_selected">Status</x-label>
                <x-select name="select_selected" id="select_selected">
                    <option value="draft">Draft</option>
                    <option value="published" selected>Published</option>
                    <option value="archived">Archived</option>
                </x-select>
            </div>

            <x-slot:code>
&lt;x-select name="status" id="status"&gt;
    &lt;option value="draft"&gt;Draft&lt;/option&gt;
    &lt;option value="published" selected&gt;Published&lt;/option&gt;
    &lt;option value="archived"&gt;Archived&lt;/option&gt;
&lt;/x-select&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Select with Grouped Options</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-select-grouped">
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

            <x-slot:code>
&lt;x-select name="vehicle" id="vehicle"&gt;
    &lt;option value=""&gt;Select a vehicle&lt;/option&gt;
    &lt;optgroup label="Cars"&gt;
        &lt;option value="sedan"&gt;Sedan&lt;/option&gt;
        &lt;option value="suv"&gt;SUV&lt;/option&gt;
    &lt;/optgroup&gt;
    &lt;optgroup label="Motorcycles"&gt;
        &lt;option value="sport"&gt;Sport&lt;/option&gt;
        &lt;option value="cruiser"&gt;Cruiser&lt;/option&gt;
    &lt;/optgroup&gt;
&lt;/x-select&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Multiple Select</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-select-multiple">
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

            <x-slot:code>
&lt;x-select name="languages[]" id="languages" multiple&gt;
    &lt;option value="php"&gt;PHP&lt;/option&gt;
    &lt;option value="javascript"&gt;JavaScript&lt;/option&gt;
    &lt;option value="python"&gt;Python&lt;/option&gt;
&lt;/x-select&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Checkbox --}}
    <div class="example-section" id="section-checkbox">
        <h2 class="example-title">Checkbox</h2>

        <h5 class="mt-3">Basic Checkbox</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-checkbox-basic">
            <x-checkbox name="terms" label="I agree to the terms and conditions" />

            <x-slot:code>
&lt;x-checkbox name="terms" label="I agree to the terms and conditions" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Checked by Default</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-checkbox-checked">
            <x-checkbox name="newsletter" label="Subscribe to newsletter" :checked="true" />

            <x-slot:code>
&lt;x-checkbox name="newsletter" label="Subscribe to newsletter" :checked="true" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Custom Value</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-checkbox-value">
            <x-checkbox name="status" label="Active" value="active" />

            <x-slot:code>
&lt;x-checkbox name="status" label="Active" value="active" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Multiple Checkboxes</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-checkbox-multiple">
            <div>
                <p class="fw-bold mb-2">Select your interests:</p>
                <x-checkbox name="interests[]" value="coding" label="Coding" />
                <x-checkbox name="interests[]" value="design" label="Design" />
                <x-checkbox name="interests[]" value="marketing" label="Marketing" />
                <x-checkbox name="interests[]" value="writing" label="Writing" />
            </div>

            <x-slot:code>
&lt;x-checkbox name="interests[]" value="coding" label="Coding" /&gt;
&lt;x-checkbox name="interests[]" value="design" label="Design" /&gt;
&lt;x-checkbox name="interests[]" value="marketing" label="Marketing" /&gt;
&lt;x-checkbox name="interests[]" value="writing" label="Writing" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Checkbox with HTML Label</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-checkbox-html">
            <x-checkbox name="privacy" label="I accept the <a href='#'>privacy policy</a>" />

            <x-slot:code>
&lt;x-checkbox name="privacy" label="I accept the &lt;a href='#'&gt;privacy policy&lt;/a&gt;" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Validation States --}}
    <div class="example-section" id="section-validation">
        <h2 class="example-title">Validation States</h2>

        <div class="alert alert-info">
            <strong>Note:</strong> Input components automatically display validation errors when they exist.
            This demo simulates the appearance with the <code>is-invalid</code> class.
        </div>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-validation">
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

            <x-slot:code>
&lt;!-- Valid state --&gt;
&lt;input type="text" class="form-control is-valid" value="Valid value"&gt;
&lt;div class="valid-feedback"&gt;Looks good!&lt;/div&gt;

&lt;!-- Invalid state --&gt;
&lt;input type="email" class="form-control is-invalid" value="not-an-email"&gt;
&lt;div class="invalid-feedback"&gt;Please provide a valid email address.&lt;/div&gt;

&lt;!-- With component --&gt;
&lt;x-email name="email" id="email" /&gt;
&lt;x-error field="email" /&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Complete Form Example --}}
    <div class="example-section" id="section-complete">
        <h2 class="example-title">Complete Form with All Input Types</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-complete">
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

            <x-slot:code>
&lt;x-form action="/register"&gt;
    &lt;div class="row mb-3"&gt;
        &lt;div class="col-md-6"&gt;
            &lt;x-label for="full_name"&gt;Full Name&lt;/x-label&gt;
            &lt;x-text name="full_name" id="full_name" /&gt;
        &lt;/div&gt;
        &lt;div class="col-md-6"&gt;
            &lt;x-label for="email"&gt;Email&lt;/x-label&gt;
            &lt;x-email name="email" id="email" /&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;div class="row mb-3"&gt;
        &lt;div class="col-md-6"&gt;
            &lt;x-label for="password"&gt;Password&lt;/x-label&gt;
            &lt;x-password name="password" id="password" /&gt;
        &lt;/div&gt;
        &lt;div class="col-md-6"&gt;
            &lt;x-label for="phone"&gt;Phone&lt;/x-label&gt;
            &lt;x-input type="tel" name="phone" id="phone" /&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;x-label for="bio"&gt;Bio&lt;/x-label&gt;
    &lt;x-textarea name="bio" id="bio" rows="4" /&gt;

    &lt;x-checkbox name="newsletter" label="Subscribe to newsletter" /&gt;
    &lt;x-checkbox name="terms" label="I agree to terms" /&gt;

    &lt;x-hidden name="form_id" value="registration" /&gt;

    &lt;x-btn type="submit" variant="primary"&gt;Submit&lt;/x-btn&gt;
&lt;/x-form&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-date', 'title' => 'Date Input'],
        ['id' => 'section-time', 'title' => 'Time Input'],
        ['id' => 'section-textarea', 'title' => 'Textarea'],
        ['id' => 'section-select', 'title' => 'Select'],
        ['id' => 'section-checkbox', 'title' => 'Checkbox'],
        ['id' => 'section-validation', 'title' => 'Validation States'],
        ['id' => 'section-complete', 'title' => 'Complete Form Example'],
    ]" />
@endsection
