<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUkmImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukm_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ukm_id')->unsigned();
            $table->string('path');
            $table->string('name');
            $table->timestamps();
            $table->foreign('ukm_id')->references('id')->on('ukm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ukm_images');
        Schema::enableForeignKeyConstraints();
    }
}
