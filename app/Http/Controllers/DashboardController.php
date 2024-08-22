<?php

namespace App\Http\Controllers;
use App\Models\Pinjaman;
use App\Models\Pengembalian;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard.index');
    // }
    public function index()
    {
        $totalPeminjaman = Pinjaman::count();
        $totalPengembalian = Pengembalian::count();
        $totalBuku = Buku::count();

        return view('dashboard.index', compact('totalPeminjaman', 'totalPengembalian', 'totalBuku'));
    }
}
