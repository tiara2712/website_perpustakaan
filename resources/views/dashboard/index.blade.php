@extends('layout.master')

@section('title', 'dashboard')

@section('content')
        <div class="main-content">
          <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Dashboard</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <a href="/pinjaman" class="text-decoration-none">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Peminjaman</h4>
                    <div class="card-body">
                      {{ $totalPeminjaman }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <a href="/pengembalian" class="text-decoration-none">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengembalian</h4>
                    <div class="card-body">
                      {{ $totalPengembalian }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <a href="/buku" class="text-decoration-none">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Buku</h4>
                    <div class="card-body">
                      {{ $totalBuku }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
@endsection