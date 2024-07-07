<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the last inserted id
        $lastArticle = DB::table('articles')->orderBy('idArtikel', 'desc')->first();
        
        // Determine the new id
        if ($lastArticle) {
            $lastIdNumber = (int) substr($lastArticle->idArtikel, 7);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }
        
        $newId = 'ARTIKEL' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        DB::table('articles')->insert([
            'idArtikel' => $newId,
            'judulArtikel' => Str::random(49), // Contoh judul artikel random dengan 49 karakter
            'isiArtikel' => Str::random(600), // Contoh isi artikel random dengan 600 karakter
            'idAdmin' => 'ADMCHE2023',
        ]);
    }
}
