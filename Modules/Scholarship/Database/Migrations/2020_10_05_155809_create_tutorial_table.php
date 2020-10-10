<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_tutorial', function (Blueprint $table) {
            $table->id();
            $table->string('laporan_beasiswa');
            $table->string('akun_mahasiswa');
            $table->string('akun_juri');
            $table->string('grup_fgd');
            $table->string('pemberitahuan_admin');
            $table->string('periode');
            $table->string('seleksi_beasiswa');
            $table->string('ketentuan_beasiswa_admin');
            $table->string('juri_fgd');
            $table->string('juri_karya_tulis');
            $table->string('pemberitahuan_mahasiswa');
            $table->string('ketentuan_beasiswa_mahasiswa');
            $table->string('pengumpulan_dokumen_mahasiswa');
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
        Schema::dropIfExists('scholarship_tutorial');
    }
}
