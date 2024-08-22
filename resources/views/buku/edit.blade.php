@extends('layout.master')

@section('title', 'Edit Data Buku')
    
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Buku</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <h4>Edit Data Buku</h4>
            </div>
            <div class="card-body">
                <form action="/buku/{{ $buku->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="{{ $buku->kode }}">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ $buku->penerbit }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $buku->kategori_id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rak_id">Rak</label>
                        <select name="rak_id" id="rak_id" class="form-control" required>
                            @foreach ($raks as $rak)
                                <option value="{{ $rak->id }}" {{ $rak->id == $buku->rak_id ? 'selected' : '' }}>
                                    {{ $rak->nama_rak }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="form-control" value="{{ $buku->pengarang }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_halaman">Jumlah Halaman</label>
                        <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control" value="{{ $buku->jumlah_halaman }}">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" value="{{ $buku->stok }}">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}">
                    </div>
                    <button class="btn btn-sm btn-warning" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
