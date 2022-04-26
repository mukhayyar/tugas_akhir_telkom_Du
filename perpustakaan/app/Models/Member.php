<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
