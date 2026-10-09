@props(['item'])

<a href="{{ route('tampil.galeri.detail', $item->id_galeri) }}" class="text-decoration-none d-block h-100">
    <div class="card border-0 shadow-sm overflow-hidden h-100">
        <div class="ratio ratio-1x1 position-relative">
            @if($item->thumbnail)
                <img src="{{ $item->thumbnail }}"
                     alt="{{ $item->judul }}"
                     class="object-fit-cover w-100 h-100">
            @else
                <div class="bg-secondary d-flex align-items-center justify-content-center">
                    <i class="bi bi-camera-video text-white" style="font-size: 2.5rem;"></i>
                </div>
            @endif

            @if($item->isVideo())
                <div class="position-absolute top-50 start-50 translate-middle">
                    <i class="bi bi-play-circle-fill text-white"
                       style="font-size: 3rem; text-shadow: 0 2px 8px rgba(0,0,0,0.6);"></i>
                </div>
            @endif
        </div>
        <div class="card-body p-2 text-center">
            <small class="fw-semibold text-dark">{{ Str::limit($item->judul, 30) }}</small>
        </div>
    </div>
</a>
