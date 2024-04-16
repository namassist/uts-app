<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Peminjaman extends Model {
    use HasFactory;
    protected $table = 'peminjaman';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['id_anggota', 'tanggal_pinjam', 'jumlah_pinjam', 'status'];
}
