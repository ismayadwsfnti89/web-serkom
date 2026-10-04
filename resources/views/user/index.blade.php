@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark">Manajemen User</h1>
            <p class="text-muted mb-0">Kelola akun pengguna sistem</p>
        </div>

        @if(Auth::user()->isAdmin())
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah User
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <x-search-bar
        :action="route('user.index')"
        placeholder="Cari nama, username, atau role..."
        :value="request('search')"
    />

    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="80">Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user as $index => $item)
                    <tr>
                        <td>{{ $user->firstItem() + $index }}</td>
                        <td>
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=b91c1c&color=fff"
                                 alt="{{ $item->nama }}"
                                 class="rounded-circle"
                                 width="40" height="40">
                        </td>
                        <td class="fw-semibold">{{ $item->nama }}</td>
                        <td><code>{{ $item->username }}</code></td>
                        <td>
                            @if($item->role === 'admin')
                                <span class="badge bg-primary">Admin</span>
                            @elseif($item->role === 'operator')
                                <span class="badge bg-secondary">Operator</span>
                            @else
                                <span class="badge bg-light text-dark">{{ $item->role }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.show', $item->id_user) }}"
                               class="btn btn-sm btn-outline-info" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>

                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('user.edit', $item->id_user) }}"
                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if($item->id_user !== Auth::id())
                                    <form action="{{ route('user.destroy', $item->id_user) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus user &quot;{{ $item->nama }}&quot;? Data yang dihapus tidak bisa dikembalikan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            @if(request('search'))
                                <i class="bi bi-search fs-1 d-block mb-3 opacity-50"></i>
                                <p class="mb-1 fw-medium">Tidak ada user yang cocok</p>
                                <p class="small mb-0">Coba kata kunci lain atau reset pencarian.</p>
                            @else
                                <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                                <p class="mb-1 fw-medium">Belum ada user</p>
                                <p class="small mb-0">Mulai tambahkan user pertama.</p>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($user->hasPages())
            <div class="mt-3">
                {{ $user->links() }}
            </div>
        @endif
    </div>

</div>
@endsection