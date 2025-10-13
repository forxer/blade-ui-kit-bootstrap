@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Badges')

@section('content')
    {{-- Badge Variants --}}
    <div class="example-section" id="section-variants">
        <h2 class="example-title">Badge Variants</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-variants">
            <x-badge variant="primary">Primary</x-badge>
            <x-badge variant="secondary">Secondary</x-badge>
            <x-badge variant="success">Success</x-badge>
            <x-badge variant="danger">Danger</x-badge>
            <x-badge variant="warning">Warning</x-badge>
            <x-badge variant="info">Info</x-badge>
            <x-badge variant="light">Light</x-badge>
            <x-badge variant="dark">Dark</x-badge>

            <x-slot:code>
&lt;x-badge variant="primary"&gt;Primary&lt;/x-badge&gt;
&lt;x-badge variant="secondary"&gt;Secondary&lt;/x-badge&gt;
&lt;x-badge variant="success"&gt;Success&lt;/x-badge&gt;
&lt;x-badge variant="danger"&gt;Danger&lt;/x-badge&gt;
&lt;x-badge variant="warning"&gt;Warning&lt;/x-badge&gt;
&lt;x-badge variant="info"&gt;Info&lt;/x-badge&gt;
&lt;x-badge variant="light"&gt;Light&lt;/x-badge&gt;
&lt;x-badge variant="dark"&gt;Dark&lt;/x-badge&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Pill Badges --}}
    <div class="example-section" id="section-pill">
        <h2 class="example-title">Pill Badges</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-pill">
            <x-badge variant="primary" pill>Primary</x-badge>
            <x-badge variant="secondary" pill>Secondary</x-badge>
            <x-badge variant="success" pill>Success</x-badge>
            <x-badge variant="danger" pill>Danger</x-badge>
            <x-badge variant="warning" pill>Warning</x-badge>
            <x-badge variant="info" pill>Info</x-badge>
            <x-badge variant="light" pill>Light</x-badge>
            <x-badge variant="dark" pill>Dark</x-badge>

            <x-slot:code>
&lt;x-badge variant="primary" pill&gt;Primary&lt;/x-badge&gt;
&lt;x-badge variant="secondary" pill&gt;Secondary&lt;/x-badge&gt;
&lt;x-badge variant="success" pill&gt;Success&lt;/x-badge&gt;
&lt;x-badge variant="danger" pill&gt;Danger&lt;/x-badge&gt;
&lt;x-badge variant="warning" pill&gt;Warning&lt;/x-badge&gt;
&lt;x-badge variant="info" pill&gt;Info&lt;/x-badge&gt;
&lt;x-badge variant="light" pill&gt;Light&lt;/x-badge&gt;
&lt;x-badge variant="dark" pill&gt;Dark&lt;/x-badge&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Badges in Context --}}
    <div class="example-section" id="section-context">
        <h2 class="example-title">Badges in Context</h2>

        <h5 class="mt-3">In Headings</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-headings">
            <h1>Example heading <x-badge variant="secondary">New</x-badge></h1>
            <h2>Example heading <x-badge variant="secondary">New</x-badge></h2>
            <h3>Example heading <x-badge variant="secondary">New</x-badge></h3>
            <h4>Example heading <x-badge variant="secondary">New</x-badge></h4>
            <h5>Example heading <x-badge variant="secondary">New</x-badge></h5>
            <h6>Example heading <x-badge variant="secondary">New</x-badge></h6>

            <x-slot:code>
&lt;h1&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h1&gt;
&lt;h2&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h2&gt;
&lt;h3&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h3&gt;
&lt;h4&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h4&gt;
&lt;h5&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h5&gt;
&lt;h6&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h6&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">In Buttons</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-buttons">
            <button type="button" class="btn btn-primary">
                Notifications <x-badge variant="light">4</x-badge>
            </button>
            <button type="button" class="btn btn-secondary">
                Messages <x-badge variant="light" pill>9</x-badge>
            </button>
            <button type="button" class="btn btn-success">
                Cart <x-badge variant="light">12</x-badge>
            </button>

            <x-slot:code>
&lt;button type="button" class="btn btn-primary"&gt;
    Notifications &lt;x-badge variant="light"&gt;4&lt;/x-badge&gt;
&lt;/button&gt;
&lt;button type="button" class="btn btn-secondary"&gt;
    Messages &lt;x-badge variant="light" pill&gt;9&lt;/x-badge&gt;
&lt;/button&gt;
&lt;button type="button" class="btn btn-success"&gt;
    Cart &lt;x-badge variant="light"&gt;12&lt;/x-badge&gt;
&lt;/button&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">As Counters</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-counters">
            <p>
                Inbox
                <x-badge variant="primary" pill>14</x-badge>
            </p>
            <p>
                Unread messages
                <x-badge variant="danger" pill>99+</x-badge>
            </p>
            <p>
                Notifications
                <x-badge variant="success" pill>3</x-badge>
            </p>

            <x-slot:code>
&lt;p&gt;
    Inbox
    &lt;x-badge variant="primary" pill&gt;14&lt;/x-badge&gt;
&lt;/p&gt;
&lt;p&gt;
    Unread messages
    &lt;x-badge variant="danger" pill&gt;99+&lt;/x-badge&gt;
&lt;/p&gt;
&lt;p&gt;
    Notifications
    &lt;x-badge variant="success" pill&gt;3&lt;/x-badge&gt;
&lt;/p&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Different Sizes --}}
    <div class="example-section" id="section-sizes">
        <h2 class="example-title">Different Sizes</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-sizes">
            <h1>Large heading <x-badge variant="primary">Badge</x-badge></h1>
            <h3>Medium heading <x-badge variant="primary">Badge</x-badge></h3>
            <h5>Small heading <x-badge variant="primary">Badge</x-badge></h5>
            <p>Regular text <x-badge variant="primary">Badge</x-badge></p>

            <x-slot:code>
&lt;h1&gt;Large heading &lt;x-badge variant="primary"&gt;Badge&lt;/x-badge&gt;&lt;/h1&gt;
&lt;h3&gt;Medium heading &lt;x-badge variant="primary"&gt;Badge&lt;/x-badge&gt;&lt;/h3&gt;
&lt;h5&gt;Small heading &lt;x-badge variant="primary"&gt;Badge&lt;/x-badge&gt;&lt;/h5&gt;
&lt;p&gt;Regular text &lt;x-badge variant="primary"&gt;Badge&lt;/x-badge&gt;&lt;/p&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Custom Classes --}}
    <div class="example-section" id="section-custom">
        <h2 class="example-title">With Custom Classes</h2>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-custom">
            <x-badge variant="primary" class="fs-6">Large Badge</x-badge>
            <x-badge variant="success" class="text-decoration-none">No Decoration</x-badge>
            <x-badge variant="info" class="opacity-75">75% Opacity</x-badge>

            <x-slot:code>
&lt;x-badge variant="primary" class="fs-6"&gt;Large Badge&lt;/x-badge&gt;
&lt;x-badge variant="success" class="text-decoration-none"&gt;No Decoration&lt;/x-badge&gt;
&lt;x-badge variant="info" class="opacity-75"&gt;75% Opacity&lt;/x-badge&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Badge Use Cases --}}
    <div class="example-section" id="section-usecases">
        <h2 class="example-title">Common Use Cases</h2>

        <h5 class="mt-3">Status Indicators</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-status">
            <p>Status: <x-badge variant="success">Active</x-badge></p>
            <p>Status: <x-badge variant="warning">Pending</x-badge></p>
            <p>Status: <x-badge variant="danger">Inactive</x-badge></p>
            <p>Status: <x-badge variant="secondary">Draft</x-badge></p>

            <x-slot:code>
&lt;p&gt;Status: &lt;x-badge variant="success"&gt;Active&lt;/x-badge&gt;&lt;/p&gt;
&lt;p&gt;Status: &lt;x-badge variant="warning"&gt;Pending&lt;/x-badge&gt;&lt;/p&gt;
&lt;p&gt;Status: &lt;x-badge variant="danger"&gt;Inactive&lt;/x-badge&gt;&lt;/p&gt;
&lt;p&gt;Status: &lt;x-badge variant="secondary"&gt;Draft&lt;/x-badge&gt;&lt;/p&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">Category Tags</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-tags">
            <x-badge variant="primary" pill>Technology</x-badge>
            <x-badge variant="success" pill>Featured</x-badge>
            <x-badge variant="info" pill>Tutorial</x-badge>
            <x-badge variant="warning" pill>Important</x-badge>
            <x-badge variant="danger" pill>Urgent</x-badge>

            <x-slot:code>
&lt;x-badge variant="primary" pill&gt;Technology&lt;/x-badge&gt;
&lt;x-badge variant="success" pill&gt;Featured&lt;/x-badge&gt;
&lt;x-badge variant="info" pill&gt;Tutorial&lt;/x-badge&gt;
&lt;x-badge variant="warning" pill&gt;Important&lt;/x-badge&gt;
&lt;x-badge variant="danger" pill&gt;Urgent&lt;/x-badge&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>

        <h5 class="mt-3">List Items with Badges</h5>
        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-badge-list">
            <ul class="list-group" style="max-width: 400px;">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Inbox
                    <x-badge variant="primary" pill>14</x-badge>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sent
                    <x-badge variant="primary" pill>2</x-badge>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Spam
                    <x-badge variant="danger" pill>99+</x-badge>
                </li>
            </ul>

            <x-slot:code>
&lt;ul class="list-group" style="max-width: 400px;"&gt;
    &lt;li class="list-group-item d-flex justify-content-between align-items-center"&gt;
        Inbox
        &lt;x-badge variant="primary" pill&gt;14&lt;/x-badge&gt;
    &lt;/li&gt;
    &lt;li class="list-group-item d-flex justify-content-between align-items-center"&gt;
        Sent
        &lt;x-badge variant="primary" pill&gt;2&lt;/x-badge&gt;
    &lt;/li&gt;
    &lt;li class="list-group-item d-flex justify-content-between align-items-center"&gt;
        Spam
        &lt;x-badge variant="danger" pill&gt;99+&lt;/x-badge&gt;
    &lt;/li&gt;
&lt;/ul&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-variants', 'title' => 'Badge Variants'],
        ['id' => 'section-pill', 'title' => 'Pill Badges'],
        ['id' => 'section-context', 'title' => 'Badges in Context'],
        ['id' => 'section-sizes', 'title' => 'Different Sizes'],
        ['id' => 'section-custom', 'title' => 'With Custom Classes'],
        ['id' => 'section-usecases', 'title' => 'Common Use Cases'],
    ]" />
@endsection
