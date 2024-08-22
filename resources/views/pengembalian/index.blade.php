@extends('layout.master')

@section('title', 'Pengembalian')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pengembalian</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                </div>

        @if(session('sukses'))
            <div class="alert alert-success">{{ session('sukses') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengembalian as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <a href="{{ route('pengembalian.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('pengembalian.destroy', $item->id) }}" method="POST" id="delete-form{{ $item->id }}" style="display:inline;">
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
@endsection

@push('script')
    <script>
        function confirmDelete(formId) {
            event.preventDefault();
            swal({
                title: "Apakah Anda yakin?",
                text: "Ketika Anda menekan OK, maka data Anda akan terhapus!",
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
