<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiFormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi_formal', function (Blueprint $table) {
            $table->integer('id_prestasi_formal', 11);
            $table->integer('id_anak');
            $table->string('prestasi_formal', 100);
            $table->string('bukti', 100);
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
        Schema::dropIfExists('prestasi_formal');
    }
}
