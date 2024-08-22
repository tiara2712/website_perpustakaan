@extends('layout.master')

@section('title', 'Edit Data Kategori')
    
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <h4>Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="/kategori/{{ $kategori->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="{{ $kategori->kode }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $kategori->nama }}">
                        </div>
                        <button class="btn btn-sm btn-warning" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection