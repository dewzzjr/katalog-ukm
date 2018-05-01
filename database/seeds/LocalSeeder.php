<?php

use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'product_id'    => 2, 
            'path'          => 'product/2/C9VFBJ6NG8u0FKyyQGW5vpWLLF0WnBUegPmbrhpy.jpeg',
            'ext'           => 'jpg',
            'description'   => 'Sambel Pecel Lezati',
        ]);
    }
}
