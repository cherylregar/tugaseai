<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->uuid('idPelanggan')->primary();
            $table->string('username');
            $table->string('nmPelanggan');
            $table->string('jenisKel');
            $table->char('idKampus', 10);
            $table->string('NIM_NIP');
            $table->string('fakultas');
            $table->string('emailPel')->unique();
            $table->string('passPel');
            $table->timestamps();
        
            $table->foreign('idKampus')->references('idKampus')->on('kampus')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
