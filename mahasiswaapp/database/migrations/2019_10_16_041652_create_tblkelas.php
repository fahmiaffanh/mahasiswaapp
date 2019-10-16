<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblkelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblkelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jurusan',2);
            $table->string('semester',1);
            $table->integer('ruang');
            $table->string('sesi',2);
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
        Schema::dropIfExists('tblkelas');
    }
}
