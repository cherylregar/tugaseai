<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        DB::table('pelanggan')->updateOrInsert(
            ['idPelanggan' => 'PLG001'],
            [
                'idKampus' => 'KMP001',
                'nmPelanggan' => 'Irfan Ariq',
                'jenisKel' => 'Laki-laki',
                'NIM_NIP' => '6701213001',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'emailPel' => 'irfanariq@wastepals.com',
                'passPel' => Hash::make('password123'),
            ]
        );

        DB::table('pelanggan')->updateOrInsert(
            ['idPelanggan' => 'PLG002'],
            [
                'idKampus' => 'KMP001',
                'nmPelanggan' => 'Siti Nurbayani',
                'jenisKel' => 'Perempuan',
                'NIM_NIP' => '6701213111',
                'fakultas' => 'Fakultas Ilmu Terapan',
                'emailPel' => 'sitinurbayani@wastepals.com',
                'passPel' => Hash::make('password456'),
            ]
        );

        // Tambahkan data lain jika diperlukan
    }
}
