@extends('layout.master')

@section('title', 'Edit Data Pengembalian')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pengembalian</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <h4>Edit Data Pengembalian</h4>
                </div>
                <div class="card-body">
                    <form action="/pengembalian/{{ $pengembalian->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Peminjam</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pengembalian->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $pengembalian->judul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ $pengembalian->tanggal_kembali }}" required>
                        </div>
                        <button class="btn btn-sm btn-warning" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
