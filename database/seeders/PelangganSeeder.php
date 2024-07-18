<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        DB::table('pelanggan')->insert([
            'idPelanggan' => 'PLG2024003',
            'username' => 'sitinur',
            'emailPel' => 'sitinurbayani@gmail.com',
            'passPel' => Hash::make('12345!'),
            'NIM' => '6701213015',
            'idKampus' => 'KAM001',
            'idFakultas' => 'FKT00101',
            'jenisKel' => 'Perempuan'
        ]);
    }
}
