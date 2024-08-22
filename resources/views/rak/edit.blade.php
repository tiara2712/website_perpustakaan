@extends('layout.master')

@section('title', 'Edit Rak')
    
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rak</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <h4>Edit Rak</h4>
                </div>
                <div class="card-body">
                    <form action="/rak/{{ $rak->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama_rak">Nama Rak</label>
                            <input type="text" name="nama_rak" id="nama_rak" class="form-control" value="{{ $rak->nama_rak }}">
                        </div>
                        <button class="btn btn-sm btn-warning" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection