<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();  // Menambahkan kolom created_at
        });
    }

    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn('created_at');  // Menghapus kolom created_at jika rollback
        });
    }

};
