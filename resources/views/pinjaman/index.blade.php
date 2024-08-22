@extends('layout.master')

@section('title', 'Pinjaman')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Peminjaman</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
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
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjaman as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}</td>                                    <td>
                                        <form action="{{ route('pinjaman.updateStatus', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="belum kembali" {{ $item->status === 'belum kembali' ? 'selected' : '' }}>belum kembali</option>
                                                <option value="sudah kembali" {{ $item->status === 'sudah kembali' ? 'selected' : '' }}>sudah kembali</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('pinjaman.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('pinjaman.destroy', $item->id) }}" method="POST" id="delete-form{{ $item->id }}" style="display:inline;">
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

@include('pinjaman.form')

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
