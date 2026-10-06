@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')

@include('landing.partials.hero')
@include('landing.partials.stats')
@include('landing.partials.profil')
@include('landing.partials.sambutan')   {{-- BARU --}}
@include('landing.partials.guru')       {{-- BARU --}}
@include('landing.partials.berita')
@include('landing.partials.galeri')
@include('landing.partials.pengumuman')
@include('landing.partials.ekskul')
@include('landing.partials.prestasi')
@include('landing.partials.cta')

@endsection