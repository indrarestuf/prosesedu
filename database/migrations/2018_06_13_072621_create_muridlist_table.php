<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuridlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muridlist', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('murid_id')->unsigned();
        $table->integer('tutor_id')->unsigned();
        $table->timestamps();

        $table->foreign('murid_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muridlist');
    }
}
