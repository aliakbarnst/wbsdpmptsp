<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnduhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unduhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('berita_id')->nullable();
            $table->unsignedBigInteger('kategori_unduhan_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('file')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('berita_id')->references('id')->on('beritas')->onDelete('set null');
            $table->foreign('kategori_unduhan_id')->references('id')->on('kategori_unduhans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unduhs');
    }
}
