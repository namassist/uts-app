<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjaman')->insert([
            'id_anggota' => 1,
            'tanggal_pinjam' => "2024-04-10",
            'jumlah_pinjam' => 1000000,
            'status' => "pending",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('peminjaman')->insert([
            'id_anggota' => 2,
            'tanggal_pinjam' => "2024-04-12",
            'jumlah_pinjam' => 750000,
            'status' => "selesai",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
