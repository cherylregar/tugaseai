<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_fotoAdmin_to_admins_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoAdminToAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('fotoAdmin')->nullable();
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('fotoAdmin');
        });
    }
}
