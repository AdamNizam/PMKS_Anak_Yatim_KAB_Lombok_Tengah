<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikator', function (Blueprint $table) {
            $table->integer('id_verifikator', 11);
            $table->integer('id_userlog');
            $table->string('nama_lengkap', 100);
            $table->string('nomor_sk', 15);
            $table->string('nik', 16);
            $table->string('alamat', 100);
            $table->string('email', 100);
            $table->string('no_hp', 12);
            $table->string('file_sk', 100);
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
        Schema::dropIfExists('verifikator');
    }
}
