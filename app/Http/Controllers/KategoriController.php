<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());
        return redirect('/kategori')->with('sukses', 'Data Berhasil disimpan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); // Changed from `find` to `findOrFail`
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id); // Changed from `find` to `findOrFail`
        $kategori->update($request->all());

        return redirect('/kategori')->with('sukses', 'Data Berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); // Changed from `find` to `findOrFail`
        $kategori->delete();

        return redirect('/kategori')->with('sukses', 'Data Berhasil dihapus!');
    }
}
