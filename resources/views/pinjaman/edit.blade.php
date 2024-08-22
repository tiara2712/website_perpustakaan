@extends('layout.master')

@section('title', 'Edit Data Pinjaman')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Peminjaman</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pinjaman.update', $pinjaman->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode', $pinjaman->kode) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pinjaman->nama) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $pinjaman->judul) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam', $pinjaman->tanggal_pinjam) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="belum kembali" {{ old('status', $pinjaman->status) === 'belum kembali' ? 'selected' : '' }}>belum kembali</option>
                                    <option value="sudah kembali" {{ old('status', $pinjaman->status) === 'sudah kembali' ? 'selected' : '' }}>sudah kembali</option>
                                </select>
                            </div>
                            <button class="btn btn-sm btn-warning" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
