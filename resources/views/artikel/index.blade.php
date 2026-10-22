@extends('layouts.app')

@section('konten')
    <h1>Daftar Artikel</h1>

    <a href="{{ route('artikel.create') }}">Tambah Artikel</a>

    @if (session('pesan'))
        <p>{{ session('pesan') }}</p>
    @endif

    @forelse ($artikel as $item)
        <div>
            <h3>{{ $item->judul }}</h3>
            <p>{{ $item->isi }}</p>
            <p>Status: {{ $item->status }}</p>

            <a href="{{ route('artikel.show', $item->id) }}">Detail</a>
            <a href="{{ route('artikel.edit', $item->id) }}">Edit</a>

            <form action="{{ route('artikel.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    @empty
        <p>Belum ada artikel.</p>
    @endforelse

    {{ $artikel->links() }}
@endsection