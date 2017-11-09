<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1'),
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'Supriyanto',
            'email' => 'supriyanto@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wadiri',
            'email' => 'wadiri@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sumadi',
            'email' => 'sumadi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mifta Churahman',
            'email' => 'mifta@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ki Joko',
            'email' => 'kijoko@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Marsudji',
            'email' => 'marsudji@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Dadang',
            'email' => 'dadang@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nur Said',
            'email' => 'nur.said@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sukamdi',
            'email' => 'sukamdi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sutrisno',
            'email' => 'sutrisno@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Indah Lestari',
            'email' => 'indahlestari@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Udanawu',
            'email' => 'udanawu@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Anam',
            'email' => 'anam@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Anang Syaifudin',
            'email' => 'anang.s@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sulasmi - Sunyoto',
            'email' => 'sulasmi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Hendri Cristiawan',
            'email' => 'hendri.c@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Endang Setyayuki',
            'email' => 'endang.s@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Anis Rahmawaty',
            'email' => 'anis.rahma@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sri Andari',
            'email' => 'andari@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Siswati',
            'email' => 'siswati@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nurul Hidayah',
            'email' => 'nurulhidayah@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Slamet Riyanto',
            'email' => 'riyanto@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sukarno',
            'email' => 'sukarno@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Hariono',
            'email' => 'harinono@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Edi Jarkasi',
            'email' => 'edijarkasi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Isro\'inu Rosidi',
            'email' => 'isroinu@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Hendri Eko Wiyono',
            'email' => 'hendri.eko@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ika Nurulina',
            'email' => 'ikanurulina@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Imam Suparno',
            'email' => 'imam.suparno@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Siti Zakiatun',
            'email' => 'sitizakiatun@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
