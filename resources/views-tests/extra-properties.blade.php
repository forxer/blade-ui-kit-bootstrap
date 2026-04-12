@extends('blade-ui-kit-bootstrap-tests::layout')

@section('title', 'Extra Properties')

@section('content')
<div class="container py-4">
    <h1>Extra Properties Hydration</h1>
    <p class="lead">
        This page verifies that the <code>withAttributes()</code> hydration mechanism works correctly.
        Standard components should behave identically — extra attributes stay in the attribute bag.
    </p>

    <h2 class="mt-4">Standard components (no extra properties)</h2>
    <p>These should render normally, with no regression from the <code>withAttributes()</code> override.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save />
        <x-btn-edit url="#" />
        <x-btn-delete url="#" />
        <x-btn-archives url="#" />
    </div>

    <h2 class="mt-4">Standard components with extra HTML attributes</h2>
    <p>Extra attributes should pass through to the rendered HTML (in the attribute bag), not be captured.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save data-testid="save-btn" />
        <x-btn-edit url="#" data-testid="edit-btn" aria-label="Edit item" />
        <x-btn-archives url="#" data-custom="value" />
    </div>

    <h2 class="mt-4">Components with all standard props</h2>
    <p>Verify that constructor-resolved props still work correctly after the override.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save variant="primary" size="sm" icon="check" />
        <x-btn-edit url="#" variant="warning" start-icon="pencil" hide-text />
        <x-btn-archives url="#" variant="dark" disabled />
    </div>

    <h2 class="mt-4">Visibility props</h2>
    <p>The hidden buttons should not render.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save />
        <x-btn-save :show="false" />
        <x-btn-edit url="#" :hide="true" />
        <x-btn-archives url="#" />
    </div>
</div>
@endsection
