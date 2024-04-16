<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PembayaranSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaran')->insert([
            'id_peminjaman' => 1,
            'tanggal_pembayaran' => "2024-04-15",
            'jumlah_pembayaran' => 500000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('pembayaran')->insert([
            'id_peminjaman' => 2,
            'tanggal_pembayaran' => "2024-04-20",
            'jumlah_pembayaran' => 500000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
