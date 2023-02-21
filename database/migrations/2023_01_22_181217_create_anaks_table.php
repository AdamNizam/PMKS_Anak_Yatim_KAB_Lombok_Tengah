<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->integer('id_anak', 11);
            $table->integer('id_survior');
            $table->integer('id_pekerjaan_wali');
            $table->integer('id_pendidikan');
            $table->integer('id_kecamatan');
            $table->integer('id_desa');
            $table->integer('id_dusun');
            $table->integer('id_kelas_pendidikan');
            $table->string('nama_anak', 100);
            $table->bigInteger('nomor_kk');
            $table->bigInteger('nomor_nik');
            $table->string('alamat', 100);
            $table->integer('jenis_kelamin');
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->smallInteger('usia');
            $table->string('nama_wali', 100);
            $table->string('alamat_sekolah', 100);
            $table->smallInteger('status_anak');
            $table->string('foto_anak', 100);
            $table->integer('status_verifikasi');
            $table->string('latitide', 100);
            $table->string('longitude', 100);
            $table->smallInteger('tahun');
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
        Schema::dropIfExists('anak');
    }
}
