<label for="{{ $for }}" {{ $attributes }}>
    @if ($slot->isEmpty())
        {{ $fallback }}
    @else
        {{ $slot }}
    @endif
</label>