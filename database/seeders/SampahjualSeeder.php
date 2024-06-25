<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampahJualSeeder extends Seeder
{
    public function run()
    {
        DB::table('sampahjual')->truncate();

        DB::table('sampahjual')->insert([
            [
                'idSampah' => 'SAMP001',
                'nmSampah' => 'Kertas',
                'poinjual' => 200,
                'foto' => 'fotokertas.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'idSampah' => 'SAMP002',
                'nmSampah' => 'Kardus',
                'poinjual' => 200,
                'foto' => 'fotokardus.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'idSampah' => 'SAMP003',
                'nmSampah' => 'Plastik',
                'poinjual' => 250,
                'foto' => 'fotobotol.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
