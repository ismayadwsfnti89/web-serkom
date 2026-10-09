@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')

@include('landing.partials.hero')
@include('landing.partials.stats')
@include('landing.partials.profil')
@include('landing.partials.guru')
@include('landing.partials.berita')
@include('landing.partials.prestasi')
@include('landing.partials.galeri')
@include('landing.partials.ekskul')
@include('landing.partials.pengumuman')

@endsection
