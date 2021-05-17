<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampirans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pengaduan_id')->nullable();
            $table->string('nama')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pengaduan_id')->references('id')->on('pengaduans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lampirans');
    }
}
