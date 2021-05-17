<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('kategori_berita_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('judul')->nullable();
            $table->text('konten')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('meta_deskripsi')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('slug')->nullable();
            $table->string('tajuk')->nullable();
            $table->integer('dilihat')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('set null');
            $table->foreign('kategori_berita_id')->references('id')->on('kategori_beritas')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}
