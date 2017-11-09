<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('identifier', 100)->unique();
        });

        DB::table('categories')->insert([
            ['name' => 'Handycraft and Furniture', 'identifier' => 'kerajinan'],
            ['name' => 'Makanan Olahan', 'identifier' => 'makanan'],
            ['name' => 'Sentra Batik Tulis dan Garmen', 'identifier' => 'fasion']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
