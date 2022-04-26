<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['cover_buku','judul','sinopsis','tahun_terbit'];
    public $timestamps = false;

    public function cover()
    {
        return '/storage/buku/'.$this->cover_buku;
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);

    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
}
