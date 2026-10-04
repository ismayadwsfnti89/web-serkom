@props([
    'action',           // URL tujuan form (route index)
    'placeholder' => 'Cari data...',   // Placeholder default
    'value' => null,    // Nilai search yang lagi aktif
])

<form action="{{ $action }}" method="GET" class="mb-3">
    <div class="row g-2">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text"
                       name="search"
                       class="form-control border-start-0 ps-0"
                       placeholder="{{ $placeholder }}"
                       value="{{ $value }}">
                <button class="btn btn-primary" type="submit">
                    Cari
                </button>

                @if($value)
                    <a href="{{ $action }}" class="btn btn-outline-secondary" title="Reset pencarian">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </div>

        @if($value)
            <div class="col-12">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Menampilkan hasil untuk: <strong>"{{ $value }}"</strong>
                </small>
            </div>
        @endif
    </div>
</form>