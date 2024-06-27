<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKampusTable extends Migration
{
    public function up()
    {
        Schema::create('kampus', function (Blueprint $table) {
            $table->char('idKampus', 10)->primary();
            $table->string('nmKampus', 255)->nullable(false);
            $table->string('alamatKampus', 255)->nullable(false);
            // Tambahkan kolom lain sesuai kebutuhan
            $table->timestamps(); // Jika diperlukan
        });
    }

    public function down()
    {
        Schema::dropIfExists('kampus');
    }
}


