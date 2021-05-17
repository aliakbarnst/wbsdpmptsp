<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('umur')->nullable();
            $table->string('jk')->nullable();
            $table->string('jawaban1')->nullable();
            $table->string('jawaban2')->nullable();
            $table->string('jawaban3')->nullable();
            $table->string('jawaban4')->nullable();
            $table->string('jawaban5')->nullable();
            $table->string('jawaban6')->nullable();
            $table->string('jawaban7')->nullable();
            $table->string('masukan')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
