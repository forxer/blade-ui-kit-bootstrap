<label for="{{ $for }}" {{ $attributes->merge(['class' => 'form-label']) }}>
    @if ($slot->isEmpty())
        {{ $fallback() }}
    @else
        {{ $slot }}
    @endif
</label>