<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKepribadiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kepribadians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namatipe',70);
            $table->string('slug');
            $table->string('keterangan_tipe',70);
            $table->string('julukan_tipe',70);
            $table->text('deskripsi_tipe');
            $table->text('arti_sukses');
            $table->text('saran_pengembangan');
            $table->text('kebahagiaan_tipe');
            $table->string('image_tipe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_kepribadians');
    }
}
