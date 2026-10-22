@extends('layouts.app')

@section('konten')
    <h1>Detail Artikel</h1>

    <h2>{{ $artikel->judul }}</h2>

    <p>Slug: {{ $artikel->slug }}</p>
    <p>Isi Artikel: {{ $artikel->isi }}</p>
    <p>Status: {{ $artikel->status }}</p>

    <a href="{{ route('artikel.edit', $artikel->id) }}">Edit Artikel</a>
    <br>

    <a href="{{ route('artikel.index') }}">Kembali ke Daftar Artikel</a>
@endsection