<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_galeris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('galeri_gambar_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('galeri_gambar_id')->references('id')->on('galeri_gambars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_galeris');
    }
}
