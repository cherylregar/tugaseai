<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('idArtikel', 11)->primary();
            $table->string('judulArtikel', 49);
            $table->text('isiArtikel');
            $table->string('idAdmin');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('idAdmin')->references('idAdmin')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
