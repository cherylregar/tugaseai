<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->char('idPelanggan', 10)->primary();
            $table->char('idKampus', 10);
            $table->string('nmPelanggan', 255)->nullable(false);
            $table->string('jenisKel', 10)->nullable(false);
            $table->string('NIM_NIP', 20)->nullable(false);
            $table->string('fakultas', 255)->nullable(false);
            $table->string('emailPel', 255)->nullable(false);
            $table->string('passPel', 255)->nullable(false);
            $table->timestamps();

            $table->foreign('idKampus')->references('idKampus')->on('kampus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
