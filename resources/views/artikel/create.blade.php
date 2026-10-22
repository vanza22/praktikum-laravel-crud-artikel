@extends('layouts.app')

@section('konten')
    <h1>Tambah Artikel</h1>

    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf

        <input type="text" name="judul" placeholder="Judul Artikel" value="{{ old('judul') }}">
        @error('judul')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <textarea name="isi" placeholder="Isi Artikel">{{ old('isi') }}</textarea>
        @error('isi')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <select name="status">
            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="terbit" {{ old('status') == 'terbit' ? 'selected' : '' }}>Terbit</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('artikel.index') }}">Kembali</a>
@endsection