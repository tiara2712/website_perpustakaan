<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('pinjaman.index', compact('pinjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'status' => 'required|string|in:sudah kembali,belum kembali',
        ]);

        Pinjaman::create($request->all());

        return redirect('/pinjaman')->with('sukses', 'Data Berhasil disimpan!');
    }

    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        return view('pinjaman.edit', compact('pinjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'status' => 'required|string|in:sudah kembali,belum kembali',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update($request->all());

        return redirect('/pinjaman')->with('sukses', 'Data Berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return redirect('/pinjaman')->with('sukses', 'Data Berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:sudah kembali,belum kembali',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = $request->status;
        $pinjaman->save();

        return redirect('/pinjaman')->with('sukses', 'Status Berhasil Diperbarui!');
    }
}
