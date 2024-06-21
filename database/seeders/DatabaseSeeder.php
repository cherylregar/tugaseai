<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Panggil seeder-seeder yang ingin Anda jalankan
        $this->call([
            AdminSeeder::class,
            SampahjualSeeder::class,
            PoinjualSeeder::class,
            // tambahkan seeder lainnya jika ada
        ]);
    }
}
