@props([
    'action','placeholder'=> 'cari...', 'Value' => null,
])

<form action = "{{ $action }}" method="GET" class="d-flex" style="max-width: 280px:">
    <div class="input-group">
        <span class="input-group-text bg-white">
            <i class="bi bi-search text-muted"></i></span>
            <input type="text"
                name="search"
                class="form-control"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                onchange="this.form.submit()">
    </div>
</form>
