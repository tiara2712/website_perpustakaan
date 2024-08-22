<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pinjaman'; // Assuming you are using the same table
    protected $fillable = [
        'nama',
        'judul',
        'tanggal_kembali',
        'status', // Assuming there is a status column
    ];
}
