<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKejuaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kejuaraan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_koleksi');
            $table->string('nama_kontes',100);
            $table->string('penyelenggara',100);
            $table->string('keterangan',100);
            $table->string('foto');
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
        Schema::dropIfExists('kejuaraan');
    }
}
