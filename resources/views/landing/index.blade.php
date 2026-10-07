@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')

@include('landing.partials.hero')
@include('landing.partials.stats')
@include('landing.partials.profil')
@include('landing.partials.guru')
@include('landing.partials.berita')
@include('landing.partials.galeri')
@include('landing.partials.pengumuman')
@include('landing.partials.ekskul')
@include('landing.partials.prestasi')

@endsection
