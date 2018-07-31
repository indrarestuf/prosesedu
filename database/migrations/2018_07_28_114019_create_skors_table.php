<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pelajaran_id');
            $table->foreign('pelajaran_id')->references('id')->on('pelajarans');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('benar');
            $table->tinyInteger('salah');
            $table->tinyInteger('kosong');
            $table->float('point');
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
        Schema::dropIfExists('skors');
    }
}
