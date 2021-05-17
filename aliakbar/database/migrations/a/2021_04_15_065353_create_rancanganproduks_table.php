<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRancanganproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rancanganproduks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('jenis_rancangan_id')->nullable();
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->string('no_ula')->nullable();
            $table->string('judul')->nullable();
            $table->string('tahun')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('file_surat_permohonan')->nullable();
            $table->string('file_dokumen_perancangan')->nullable();
            $table->string('file_berita_acara_tingkat_1')->nullable();
            $table->string('file_hasil_harmonisasi')->nullable();
            $table->string('file_berita_acara_perangkat_daerah')->nullable();
            $table->string('file_matrix')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('penganggung_jawab')->nullable();
            $table->string('no_wa')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('jenis_rancangan_id')->references('id')->on('jenis_rancangans')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rancanganproduks');
    }
}
