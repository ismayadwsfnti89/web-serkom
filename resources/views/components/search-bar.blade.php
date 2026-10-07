@props([
    'action',
    'placeholder' => 'Cari data...',
    'value' => null,
])

<form action="{{ $action }}" method="GET" class="mb-3">
    <div class="input-group" style="max-width: 500px;">
        <span class="input-group-text bg-white">
            <i class="bi bi-search text-muted"></i>
        </span>
        <input type="text"
               name="search"
               class="form-control"
               placeholder="{{ $placeholder }}"
               value="{{ $value }}">
        <button class="btn btn-danger" type="submit">Cari</button>

        @if($value)
            <a href="{{ $action }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-lg"></i>
            </a>
        @endif
    </div>

    @if($value)
        <small class="text-muted d-block mt-2">
            Menampilkan hasil untuk: <strong>"{{ $value }}"</strong>
        </small>
    @endif
</form>
