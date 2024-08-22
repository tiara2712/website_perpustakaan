@extends('layout.master')

@section('title', 'buku')

@section('content')
    <div class="main-content">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Buku</h4>

                    <div class="card-header-form">
                        <button class="btn btn-sm btn-success" type="button" data-target="#modal-tambah" data-toggle="modal">Tambah Data</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-stripped" id="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                                <th>Pengarang</th>
                                <th>Jumlah Halaman</th>
                                <th>Stok</th>
                                <th>Tahun Terbit</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->penerbit }}</td>
                                    <td><a href="/kategori/{{ $item->kategori_id }}">{{ $item->kategori->nama }}</a></td>
                                    <td><a href="/rak/{{ $item->rak_id }}">{{ $item->rak->nama_rak }}</a></td>
                                    <td>{{ $item->pengarang }}</td>
                                    <td>{{ $item->jumlah_halaman }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        <a href="/buku/{{ $item->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="/buku/{{ $item->id }}" method="POST" id="delete-form{{ $item->id }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form{{ $item->id }}')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@include('buku.form')

@endsection

@push('script')
<script>
    function confirmDelete(formId) {
        event.preventDefault();
        swal({
            title: "Apakah anda yakin?",
            text: "ketika anda menekan OK maka data anda akan terhapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(formId).submit();
            }
        });
    }

    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endpush
