<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::all();
        return view('rak.index', compact('rak'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rak' => 'required|string|max:255',
        ]);

        Rak::create($request->all());
        return redirect('/rak')->with('sukses', 'Data Berhasil disimpan!');
    }

    public function edit($id)
    {
        $rak = Rak::findOrFail($id); // Changed from `find` to `findOrFail`
        return view('rak.edit', compact('rak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rak' => 'required|string|max:255',
        ]);

        $rak = Rak::findOrFail($id); // Changed from `find` to `findOrFail`
        $rak->update($request->all());

        return redirect('/rak')->with('sukses', 'Data Berhasil diupdate!');
    }

    public function destroy($id)
    {
        $rak = Rak::findOrFail($id); // Changed from `find` to `findOrFail`
        $rak->delete();

        return redirect('/rak')->with('sukses', 'Data Berhasil dihapus!');
    }
}
