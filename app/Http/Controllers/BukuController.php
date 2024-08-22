<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori', 'rak')->get();
        $kategori = Kategori::all();
        $raks = Rak::all();
        return view('buku.index', compact('buku', 'kategori', 'raks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'rak_id' => 'required|exists:rak,id',
            'pengarang' => 'required|string|max:255',
            'jumlah_halaman' => 'required|integer',
            'stok' => 'required|integer',
            'tahun_terbit' => 'required|integer',
        ]);

        Buku::create($request->all());
        return redirect('/buku')->with('sukses', 'Data Berhasil disimpan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $raks = Rak::all();
        return view('buku.edit', compact('buku', 'kategori', 'raks')); // Fixed: Changed $rak to $raks
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'rak_id' => 'required|exists:rak,id',
            'pengarang' => 'required|string|max:255',
            'jumlah_halaman' => 'required|integer',
            'stok' => 'required|integer',
            'tahun_terbit' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect('/buku')->with('sukses', 'Data Berhasil diupdate!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku')->with('sukses', 'Data Berhasil dihapus!');
    }
}
