<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanIkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_ikms', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan')->nullable();
            $table->string('urutan')->nullable();
            $table->string('status')->nullable();
            $table->string('jawaban1')->nullable();
            $table->string('jawaban2')->nullable();
            $table->string('jawaban3')->nullable();
            $table->string('jawaban4')->nullable();
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
        Schema::dropIfExists('pertanyaan_ikms');
    }
}
