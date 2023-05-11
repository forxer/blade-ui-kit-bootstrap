@error($errorField, $errorBag)
    <div id="validation-{{ $errorField }}-feedback" {{ $attributes->merge(['class' => 'invalid-feedback']) }}>
        @if ($slot->isEmpty())
            @if (is_array($messages))
                <ul class="list-unstyled">
                    @foreach ($messages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ $message }}
            @endif
        @else
            {{ $slot }}
        @endif
    </div>
@enderror
