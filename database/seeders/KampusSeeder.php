<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KampusSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data kampus
        DB::table('kampus')->insert([
            'idKampus' => 'KMP001',
            'nmKampus' => 'Universitas Telkom',
            'alamatKampus' => 'Kabupaten Bandung',
        ]);
        // Tambahkan data lain jika diperlukan
    }
}
