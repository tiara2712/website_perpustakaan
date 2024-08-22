<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengembalianController extends Controller
{
    public function index()
    {
        // Assuming 'status' is 1 for returned items
        $pengembalian = Pengembalian::where('status', 1)->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'judul' => 'required|string|max:255',
    //         'tanggal_kembali' => 'required|date',
    //     ]);

    //     // Assuming you set 'status' to 1 when creating a return entry
    //     $data = $request->all();
    //     $data['status'] = 1;

    //     Pengembalian::create($data);
    //     return redirect('/pengembalian')->with('sukses', 'Data Berhasil disimpan!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal_kembali' => 'required|date',
        ]);

        $data = $request->all();
        $data['status'] = 1;

        Pengembalian::create($data);
        return redirect('/pengembalian')->with('sukses', 'Data Berhasil disimpan!');
    }

    // public function edit($id)
    // {
    //     $pengembalian = Pengembalian::findOrFail($id);
    //     return view('pengembalian.edit', compact('pengembalian'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'judul' => 'required|string|max:255',
    //         'tanggal_kembali' => 'required|date',
    //     ]);

    //     $pengembalian = Pengembalian::findOrFail($id);
    //     $pengembalian->update($request->all());

    //     return redirect('/pengembalian')->with('sukses', 'Data Berhasil diupdate!');
    // }

    public function edit($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        return view('pengembalian.edit', compact('pengembalian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal_kembali' => 'required|date',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update($request->all());

        return redirect('/pengembalian')->with('sukses', 'Data Berhasil diupdate!');
    }


    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect('/pengembalian')->with('sukses', 'Data Berhasil dihapus!');
    }
}
