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
            'idPelanggan' => 'PLG2024001',
            'username' => 'cherrgr',
            'emailPel' => 'cherylregar@gmail.com',
            'passPel' => Hash::make('cherylregar!'),
            'NIM' => '6701213004',
            'idKampus' => 'KAM001',
            'idFakultas' => 'FKT00101'
        ]);
    }
}
