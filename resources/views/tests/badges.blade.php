@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Badges')

@section('content')
    {{-- Basic Badges --}}
    <div class="example-section">
        <h2 class="example-title">Badge Variants</h2>
        <div class="demo-block">
            <x-badge variant="primary">Primary</x-badge>
            <x-badge variant="secondary">Secondary</x-badge>
            <x-badge variant="success">Success</x-badge>
            <x-badge variant="danger">Danger</x-badge>
            <x-badge variant="warning">Warning</x-badge>
            <x-badge variant="info">Info</x-badge>
            <x-badge variant="light">Light</x-badge>
            <x-badge variant="dark">Dark</x-badge>
        </div>
    </div>

    {{-- Pill Badges --}}
    <div class="example-section">
        <h2 class="example-title">Pill Badges</h2>
        <div class="demo-block">
            <x-badge variant="primary" pill>Primary</x-badge>
            <x-badge variant="secondary" pill>Secondary</x-badge>
            <x-badge variant="success" pill>Success</x-badge>
            <x-badge variant="danger" pill>Danger</x-badge>
            <x-badge variant="warning" pill>Warning</x-badge>
            <x-badge variant="info" pill>Info</x-badge>
            <x-badge variant="light" pill>Light</x-badge>
            <x-badge variant="dark" pill>Dark</x-badge>
        </div>
    </div>

    {{-- Badges in Context --}}
    <div class="example-section">
        <h2 class="example-title">Badges in Context</h2>

        <h5 class="mt-3">In Headings</h5>
        <div class="demo-block">
            <h1>Example heading <x-badge variant="secondary">New</x-badge></h1>
            <h2>Example heading <x-badge variant="secondary">New</x-badge></h2>
            <h3>Example heading <x-badge variant="secondary">New</x-badge></h3>
            <h4>Example heading <x-badge variant="secondary">New</x-badge></h4>
            <h5>Example heading <x-badge variant="secondary">New</x-badge></h5>
            <h6>Example heading <x-badge variant="secondary">New</x-badge></h6>
        </div>

        <h5 class="mt-3">In Buttons</h5>
        <div class="demo-block">
            <button type="button" class="btn btn-primary">
                Notifications <x-badge variant="light">4</x-badge>
            </button>
            <button type="button" class="btn btn-secondary">
                Messages <x-badge variant="light" pill>9</x-badge>
            </button>
            <button type="button" class="btn btn-success">
                Cart <x-badge variant="light">12</x-badge>
            </button>
        </div>

        <h5 class="mt-3">As Counters</h5>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Different Sizes --}}
    <div class="example-section">
        <h2 class="example-title">Different Sizes</h2>
        <div class="demo-block">
            <h1>Large heading <x-badge variant="primary">Badge</x-badge></h1>
            <h3>Medium heading <x-badge variant="primary">Badge</x-badge></h3>
            <h5>Small heading <x-badge variant="primary">Badge</x-badge></h5>
            <p>Regular text <x-badge variant="primary">Badge</x-badge></p>
        </div>
    </div>

    {{-- Custom Classes --}}
    <div class="example-section">
        <h2 class="example-title">With Custom Classes</h2>
        <div class="demo-block">
            <x-badge variant="primary" class="fs-6">Large Badge</x-badge>
            <x-badge variant="success" class="text-decoration-none">No Decoration</x-badge>
            <x-badge variant="info" class="opacity-75">75% Opacity</x-badge>
        </div>
    </div>

    {{-- Badge Use Cases --}}
    <div class="example-section">
        <h2 class="example-title">Common Use Cases</h2>

        <h5 class="mt-3">Status Indicators</h5>
        <div class="demo-block">
            <p>Status: <x-badge variant="success">Active</x-badge></p>
            <p>Status: <x-badge variant="warning">Pending</x-badge></p>
            <p>Status: <x-badge variant="danger">Inactive</x-badge></p>
            <p>Status: <x-badge variant="secondary">Draft</x-badge></p>
        </div>

        <h5 class="mt-3">Category Tags</h5>
        <div class="demo-block">
            <x-badge variant="primary" pill>Technology</x-badge>
            <x-badge variant="success" pill>Featured</x-badge>
            <x-badge variant="info" pill>Tutorial</x-badge>
            <x-badge variant="warning" pill>Important</x-badge>
            <x-badge variant="danger" pill>Urgent</x-badge>
        </div>

        <h5 class="mt-3">List Items with Badges</h5>
        <div class="demo-block">
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
        </div>
    </div>

    {{-- Code Examples --}}
    <div class="example-section">
        <h2 class="example-title">Code Examples</h2>

        <div class="code-example">
            <h6>Basic Badge</h6>
            <pre><code>&lt;x-badge variant="primary"&gt;Primary&lt;/x-badge&gt;
&lt;x-badge variant="success"&gt;Success&lt;/x-badge&gt;
&lt;x-badge variant="danger"&gt;Danger&lt;/x-badge&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Pill Badge</h6>
            <pre><code>&lt;x-badge variant="primary" pill&gt;Primary&lt;/x-badge&gt;
&lt;x-badge variant="success" pill&gt;Success&lt;/x-badge&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>In Headings</h6>
            <pre><code>&lt;h1&gt;Example heading &lt;x-badge variant="secondary"&gt;New&lt;/x-badge&gt;&lt;/h1&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>As Counter</h6>
            <pre><code>&lt;button type="button" class="btn btn-primary"&gt;
    Notifications &lt;x-badge variant="light"&gt;4&lt;/x-badge&gt;
&lt;/button&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>Status Indicator</h6>
            <pre><code>&lt;p&gt;Status: &lt;x-badge variant="success"&gt;Active&lt;/x-badge&gt;&lt;/p&gt;
&lt;p&gt;Status: &lt;x-badge variant="warning"&gt;Pending&lt;/x-badge&gt;&lt;/p&gt;</code></pre>
        </div>

        <div class="code-example">
            <h6>With Custom Classes</h6>
            <pre><code>&lt;x-badge variant="primary" class="fs-6"&gt;Large Badge&lt;/x-badge&gt;</code></pre>
        </div>
    </div>
@endsection
