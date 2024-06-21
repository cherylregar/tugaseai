<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SampahjualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sampahjual')->insert([
            [
                'idSampah' => 'SAMP001',
                'nmSampah' => 'Kertas',
                'poinjual' => 200,
                'foto' => 'fotokertas.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idSampah' => 'SAMP002',
                'nmSampah' => 'Kardus',
                'poinjual' => 200,
                'foto' => 'fotokardus.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idSampah' => 'SAMP003',
                'nmSampah' => 'Plastik',
                'poinjual' => 250,
                'foto' => 'fotobotol.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
