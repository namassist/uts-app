<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pembayaran extends Model {
    use HasFactory;
    protected $table = 'pembayaran';
    public $timestamps = false;

    protected $fillable = ['id_peminjaman', 'tanggal_pembayaran', 'jumlah_pembayaran'];
}
