@extends('layouts.app')

@section('konten')
    <h1>Edit Artikel</h1>

    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="judul" value="{{ $artikel->judul }}" placeholder="Judul Artikel">
        <br>

        <textarea name="isi" placeholder="Isi Artikel">{{ $artikel->isi }}</textarea>
        <br>

        <select name="status">
            <option value="draft" {{ $artikel->status == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="terbit" {{ $artikel->status == 'terbit' ? 'selected' : '' }}>Terbit</option>
        </select>
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('artikel.index') }}">Kembali</a>
@endsection