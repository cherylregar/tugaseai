<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('idAdmin')->primary();
            $table->string('nmAdmin');
            $table->string('emailAdmin')->unique();
            $table->string('passAdmin');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('fotoAdmin')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
