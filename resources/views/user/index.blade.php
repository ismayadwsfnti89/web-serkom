@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Manajemen User</h1>
        <p class="text-muted mb-0">Kelola akun pengguna sistem</p>
    </div>

    @if(Auth::user()->isAdmin())
        <a href="{{ route('user.create') }}" class="btn btn-danger">
            <i class="bi bi-plus-circle me-2"></i>Tambah User
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
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
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=dc3545&color=fff"
                             alt="{{ $item->nama }}"
                             class="rounded-circle"
                             width="40" height="40">
                    </td>
                    <td class="fw-semibold">{{ $item->nama }}</td>
                    <td><code>{{ $item->username }}</code></td>
                    <td>
                        @if($item->role === 'admin')
                            <span class="badge bg-primary">Admin</span>
                        @else
                            <span class="badge bg-secondary">Operator</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('user.show', encrypt_id($item->id_user)) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="bi bi-eye"></i>
                        </a>

                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('user.edit', encrypt_id($item->id_user)) }}"
                               class="btn btn-sm btn-outline-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @if($item->id_user !== Auth::id())
                                <form action="{{ route('user.destroy', encrypt_id($item->id_user)) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
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
                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                        <p class="mb-0">Belum ada user.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($user->hasPages())
        <div class="mt-3">{{ $user->links() }}</div>
    @endif
</div>
@endsection
