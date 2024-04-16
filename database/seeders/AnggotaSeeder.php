<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggota')->insert([
            'nama' => 'Jhon Doe',
            'alamat' => 'Jalan Merdeka No 123',
            'telepon' => '0821234567890',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('anggota')->insert([
            'nama' => 'Jane Smith',
            'alamat' => 'Jalan Gatot Subroto',
            'telepon' => '082345678901',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
