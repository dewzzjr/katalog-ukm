<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ukm_id')->unsigned();
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->float('longitude', 10, 6);
            $table->float('latitude', 10, 6);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ukm_id')->references('id')->on('ukm')->onDelete('cascade');
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
        Schema::dropIfExists('locations');
        Schema::enableForeignKeyConstraints();
    }
}
