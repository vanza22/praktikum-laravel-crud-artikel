@extends('layouts.app')

@section('konten')
    <h1>Tambah Artikel</h1>

    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf

        <input type="text" name="judul" placeholder="Judul Artikel">
        <br>

        <textarea name="isi" placeholder="Isi Artikel"></textarea>
        <br>

        <select name="status">
            <option value="draft">Draft</option>
            <option value="terbit">Terbit</option>
        </select>
        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('artikel.index') }}">Kembali</a>
@endsection