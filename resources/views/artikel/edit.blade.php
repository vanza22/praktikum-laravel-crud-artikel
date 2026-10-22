@extends('layouts.app')

@section('konten')
    <h1>Edit Artikel</h1>

    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" placeholder="Judul Artikel">
        @error('judul')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <textarea name="isi" placeholder="Isi Artikel">{{ old('isi', $artikel->isi) }}</textarea>
        @error('isi')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <select name="status">
            <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="terbit" {{ old('status', $artikel->status) == 'terbit' ? 'selected' : '' }}>Terbit</option>
        </select>
        @error('status')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('artikel.index') }}">Kembali</a>
@endsection