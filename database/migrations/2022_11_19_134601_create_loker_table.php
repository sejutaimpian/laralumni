<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loker', function (Blueprint $table) {
            $table->id();
            $table->string('logo_perusahaan', 255);
            $table->string('pekerjaan', 100);
            $table->string('nama_perusahaan', 100);
            $table->string('penempatan', 100);
            $table->string('gaji', 100);
            $table->string('pendidikan', 100);
            $table->string('usia', 100);
            $table->string('kualifikasi', 100);
            $table->string('sumber', 255);
            $table->date('deadline');
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
        Schema::dropIfExists('loker');
    }
};
