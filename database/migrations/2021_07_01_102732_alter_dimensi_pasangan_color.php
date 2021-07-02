<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDimensiPasanganColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dimensi_pasangans', function (Blueprint $table) {
            $table->string('color')->after('dimensiB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dimensi_pasangans', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }
}
