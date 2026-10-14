@extends('layouts.tampil')
@section('title', 'Tentang Pembuat')
@section('subtitle', 'Profil pengembang aplikasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">
                    <img src="{{ asset('img/profil.jpg') }}"
                         alt="Foto Profil"
                         class="rounded-circle mb-3"
                         width="150" height="150"
                         style="object-fit:cover; border:4px solid #0284c7;">

                    <h3 class="fw-bold mb-1">Ismaya Dewi Sofianti</h3>
                    <p class="text-muted mb-2">
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        Siswa RPL — SMK YPC Tasikmalaya
                    </p>
                </div>

                <hr>

                <h6 class="fw-bold mb-3">
                    <i class="bi bi-person-vcard me-2 text-primary"></i>Biodata
                </h6>

                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" width="180">
                            <i class="bi bi-person me-2"></i>Nama Lengkap
                        </td>
                        <td><strong>Ismaya Dewi Sofianti</strong></td>
                    </tr>
                    <tr>
                        <td class="text-muted">
                            <i class="bi bi-calendar-heart me-2"></i>Tempat, Tanggal Lahir
                        </td>
                        <td>Tasikmalaya, 08 September 2009</td>
                    </tr>
                    <tr>
                        <td class="text-muted">
                            <i class="bi bi-geo-alt me-2"></i>Alamat
                        </td>
                        <td>Manonjaya, Kab. Tasikmalaya, Jawa Barat</td>
                    </tr>
                    <tr>
                        <td class="text-muted">
                            <i class="bi bi-envelope me-2"></i>Email
                        </td>
                        <td>
                            <a href="mailto:ismayadwsfnti89@gmail.com" class="text-danger text-decoration-none">
                                ismayadwsfnti89@gmail.com
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">
                            <i class="bi bi-telephone me-2"></i>No. HP
                        </td>
                        <td>0895-0786-8792</td>
                    </tr>
                    <tr>
                        <td class="text-muted">
                            <i class="bi bi-gender-ambiguous me-2"></i>Jenis Kelamin
                        </td>
                        <td>Perempuan</td>
                    </tr>
                </table>

                <hr>
            </div>
        </div>
    </div>
</div>
@endsection