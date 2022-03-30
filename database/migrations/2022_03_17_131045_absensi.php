<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Absensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('kelas_id');
            $table->string('materi_id');
            $table->string('asisten_id');
            $table->string('teaching_role');
            $table->date('date');
            $table->string('start');
            $table->string('end')->nullable();
            $table->string('duration')->nullable();
            $table->string('kode_id')->nullable();
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
        Schema::dropIfExists('absensi');
    }
}
