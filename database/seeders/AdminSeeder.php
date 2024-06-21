<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Data admin yang akan dimasukkan ke dalam tabel admins
        $admins = [
            [
                'idAdmin' => 'ADMABD2023',
                'nmAdmin' => 'Abdul Hafizh',
                'emailAdmin' => 'abdulhafizh@wastemate.com',
                'passAdmin' => Hash::make('12345'), // Ganti 'password' dengan sandi yang dienkripsi
                'created_at' => now(),
                'updated_at' => now(),
                'fotoAdmin' => null,
            ],
            [
                'idAdmin' => 'ADMCHE2023',
                'nmAdmin' => 'Cheryl Lidia Regar',
                'emailAdmin' => 'cherylregar@wastemate.com',
                'passAdmin' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
                'fotoAdmin' => 'adminche.png',
            ],
        ];

        // Masukkan data ke dalam tabel admins
        DB::table('admins')->insert($admins);
    }
}
