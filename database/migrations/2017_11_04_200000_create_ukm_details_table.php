<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUkmDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukm_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ukm_id')->unsigned();
            $table->string('contact');
            $table->enum('type', [
                'website',
                'telepon',
                'whatsapp',
                'facebook',
                'instagram',
                'twitter',
                'line',
                'tokopedia',
                'bukalapak'
            ]);
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
        Schema::dropIfExists('ukm_details');
        Schema::enableForeignKeyConstraints();
    }
}
