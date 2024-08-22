<?php

namespace App\Models;

use App\Models\Rak;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'kode', 
        'judul', 
        'penerbit',
        'kategori_id', 
        'rak_id', 
        'pengarang', 
        'jumlah_halaman', 
        'stok', 
        'tahun_terbit'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
