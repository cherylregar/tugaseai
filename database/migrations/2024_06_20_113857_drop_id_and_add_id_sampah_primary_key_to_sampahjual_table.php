<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropIdAndAddIdSampahPrimaryKeyToSampahjualTable extends Migration
{
    public function up()
    {
        Schema::table('sampahjual', function (Blueprint $table) {
            // Drop kolom 'id'
            $table->dropColumn('id');

            // Tidak perlu menambahkan primary key karena sudah menggunakan `idSampah` yang unik
        });
    }

    public function down()
    {
        Schema::table('sampahjual', function (Blueprint $table) {
            // Kembalikan perubahan jika rollback migrasi
            $table->bigIncrements('id');
        });
    }
}
