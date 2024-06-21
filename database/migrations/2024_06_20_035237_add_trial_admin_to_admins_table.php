<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AddTrialAdminToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('admins')->insert([
            'idAdmin' => 'ADMTRI2023',
            'nmAdmin' => 'Trial Admin',
            'emailAdmin' => 'trial@wastemate.com',
            'passAdmin' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('admins')->where('idAdmin', 'ADMTRI2023')->delete();
    }
}
