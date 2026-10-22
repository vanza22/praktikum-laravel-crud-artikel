<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Artikel::create([
            'user_id' => auth()->id() ?? 1,
            'judul' => $request->judul,
            'slug' => \Illuminate\Support\Str::slug($request->judul),
            'isi' => $request->isi,
            'status' => $request->status,
        ]);

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
         $artikel->update([
            'judul' => $request->judul,
            'slug' => \Illuminate\Support\Str::slug($request->judul),
            'isi' => $request->isi,
            'status' => $request->status,
        ]);

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
         $artikel->delete();

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil dihapus');
    }
}
