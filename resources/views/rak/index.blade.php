@extends('layout.master')

@section('title', 'rak')

@section('content')
        <div class="main-content">
          <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Rak</h4>

                    <div class="card-header-form">
                        <button class="btn btn-sm btn-success" type="button" data-target="#modal-tambah" data-toggle="modal">Tambah Data</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-stripped" id="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th>Nama Rak</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rak as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_rak }}</td>
                                    <td>
                                        <a href="/rak/{{ $item->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="/rak/{{ $item->id }}" method="POST" id="delete-form{{ $item->id }}" style="display:inline;">
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
      @include('rak.form')
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