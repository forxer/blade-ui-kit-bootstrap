@extends('blade-ui-kit-bootstrap::tests.layout')

@section('title', 'Modal Variations')

@section('content')
    {{-- Modal Sizes --}}
    <div class="example-section" id="section-sizes">
        <h2 class="example-title">Modal Sizes</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-sizes">
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

            <x-slot:code>
&lt;!-- Small --&gt;
&lt;x-modal id="smallModal" title="Small Modal" size="sm"&gt;
    &lt;p&gt;This is a small modal.&lt;/p&gt;
&lt;/x-modal&gt;

&lt;!-- Default --&gt;
&lt;x-modal id="defaultModal" title="Default Modal"&gt;
    &lt;p&gt;This is a default sized modal.&lt;/p&gt;
&lt;/x-modal&gt;

&lt;!-- Large --&gt;
&lt;x-modal id="largeModal" title="Large Modal" size="lg"&gt;
    &lt;p&gt;This is a large modal.&lt;/p&gt;
&lt;/x-modal&gt;

&lt;!-- Extra Large --&gt;
&lt;x-modal id="xlModal" title="Extra Large Modal" size="xl"&gt;
    &lt;p&gt;This is an extra large modal.&lt;/p&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Scrollable Modal --}}
    <div class="example-section" id="section-scrollable">
        <h2 class="example-title">Scrollable Modal</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-scrollable">
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

            <x-slot:code>
&lt;x-modal id="scrollableModal" title="Scrollable Modal" :scrollable="true"&gt;
    &lt;p&gt;This modal has a lot of content that will scroll within the modal body.&lt;/p&gt;
    &lt;!-- Long content here --&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="secondary" data-bs-dismiss="modal"&gt;Close&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Centered Modal --}}
    <div class="example-section" id="section-centered">
        <h2 class="example-title">Vertically Centered Modal</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-centered">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#centeredModal">
                Launch Centered Modal
            </button>

            <x-modal id="centeredModal" title="Centered Modal" :centered="true">
                <p>This modal is vertically centered on the page.</p>
            </x-modal>

            <x-slot:code>
&lt;x-modal id="centeredModal" title="Centered Modal" :centered="true"&gt;
    &lt;p&gt;This modal is vertically centered on the page.&lt;/p&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>

    {{-- Modal with List Content --}}
    <div class="example-section" id="section-list">
        <h2 class="example-title">Modal with List Content</h2>

        <x-blade-ui-kit-bootstrap::tests.demo-with-code id="code-list">
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

            <x-slot:code>
&lt;x-modal id="listModal" title="Feature List"&gt;
    &lt;h6&gt;Package Features:&lt;/h6&gt;
    &lt;ul&gt;
        &lt;li&gt;44 pre-built components&lt;/li&gt;
        &lt;li&gt;Bootstrap 4 and 5 support&lt;/li&gt;
        &lt;li&gt;Automatic validation integration&lt;/li&gt;
        &lt;li&gt;Old value persistence&lt;/li&gt;
    &lt;/ul&gt;

    &lt;x-slot:footer&gt;
        &lt;x-btn variant="primary" data-bs-dismiss="modal"&gt;Got it!&lt;/x-btn&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;
            </x-slot:code>
        </x-blade-ui-kit-bootstrap::tests.demo-with-code>
    </div>
@endsection

@section('sidebar')
    <x-blade-ui-kit-bootstrap::tests.table-of-contents :sections="[
        ['id' => 'section-sizes', 'title' => 'Modal Sizes'],
        ['id' => 'section-scrollable', 'title' => 'Scrollable Modal'],
        ['id' => 'section-centered', 'title' => 'Vertically Centered Modal'],
        ['id' => 'section-list', 'title' => 'Modal with List Content'],
    ]" />
@endsection
