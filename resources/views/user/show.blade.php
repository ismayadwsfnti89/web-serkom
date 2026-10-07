@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold">Detail User</h1>
        <p class="text-muted mb-0">Informasi lengkap user</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('user.edit', encrypt_id($user->id_user)) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit
        </a>
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="dashboard-card">
    <div class="row align-items-center">
        <div class="col-md-3 text-center">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=dc3545&color=fff&size=150"
                 alt="{{ $user->nama }}"
                 class="rounded-circle mb-3"
                 width="150" height="150">
            <h4 class="mb-1">{{ $user->nama }}</h4>
            <p class="text-muted mb-2">{{ $user->username }}</p>
            @if($user->role === 'admin')
                <span class="badge bg-primary">Admin</span>
            @else
                <span class="badge bg-secondary">Operator</span>
            @endif
        </div>
        <div class="col-md-9">
            <h5 class="mb-3">Informasi User</h5>
            <table class="table table-borderless">
                <tr>
                    <td class="text-muted" width="200">Nama</td>
                    <td><strong>{{ $user->nama }}</strong></td>
                </tr>
                <tr>
                    <td class="text-muted">Username</td>
                    <td><code>{{ $user->username }}</code></td>
                </tr>
                <tr>
                    <td class="text-muted">Role</td>
                    <td>{{ $user->role }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Terdaftar Sejak</td>
                    <td>{{ $user->created_at->format('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
