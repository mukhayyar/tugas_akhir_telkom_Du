<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_buku';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

}
