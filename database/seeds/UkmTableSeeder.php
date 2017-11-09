<?php

use Illuminate\Database\Seeder;

class UkmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->ukm();
        $this->detail();
        $this->call(LocationsTableSeeder::class);
    }

    private function ukm() {

        DB::table('ukm')->insert([
            'name'        => 'Putra mandiri',
            'description' => 'Mainan anak dari kayu',
            'user_id'     => 2,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'UD. Gotong royong/Alibaba',
            'description' => 'Kerajinan tas',
            'user_id'     => 3,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'UD. Kundi jaya',
            'description' => 'Aneka gerabah',
            'user_id'     => 4,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'American Indian art',
            'description' => 'Aneka aksesoris indian',
            'user_id'     => 5,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Sanggar rama barata',
            'description' => 'Kerajinan wayang kulit',
            'user_id'     => 6,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Karya candra abadi',
            'description' => 'Aneka kerajinan sabut kelapa',
            'user_id'     => 7,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'UD. New Creation',
            'description' => 'Aneka kerajinan kayu',
            'user_id'     => 8,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'UD. Nur Mahligai',
            'description' => 'Kerajinan ukir, mebel',
            'user_id'     => 9,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'UD. Logam jaya',
            'description' => 'Senapan angin',
            'user_id'     => 10,
            'category_id' => 1,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Sanggar krisna',
            'description' => 'Kerajinan tulisan wayang',
            'user_id'     => 11,
            'category_id' => 1,
        ]);

        DB::table('ukm')->insert([
            'name'        => 'UD. Indah Jaya',
            'description' => 'Permen lolipop, kripik jahe',
            'user_id'     => 12,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Srikandi',
            'description' => 'Aneka keripik & aneka camilan',
            'user_id'     => 13,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Ken Tea',
            'description' => 'Bubuk the hitam dan bubuk kopi',
            'user_id'     => 14,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'KSU Guyub Santoso',
            'description' => 'Cokelat',
            'user_id'     => 15,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Kuda Terbang Jaya',
            'description' => 'Enteng-enteng Kacang Wijen',
            'user_id'     => 16,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Kelapa sari',
            'description' => 'Jenang, wajik, kletik',
            'user_id'     => 17,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Kalimasada Cokies, Cake & Bakery',
            'description' => 'Roti kering',
            'user_id'     => 18,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Anisa jaya',
            'description' => 'Kardol  buah & Keripik buah',
            'user_id'     => 19,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Sejahtera Abadi',
            'description' => 'Sari belimbing',
            'user_id'     => 20,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Jawi farm',
            'description' => 'Acar',
            'user_id'     => 21,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Almadinah & Lezati',
            'description' => 'Sambel pecel',
            'user_id'     => 22,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'UD. Budi luhur',
            'description' => 'Gula kelapa',
            'user_id'     => 23,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Jaya Rasa',
            'description' => 'Sambel pecel',
            'user_id'     => 24,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Saritoga ngundi mulyo',
            'description' => 'Minuman toga, beras kencur',
            'user_id'     => 25,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Sidodadi Makmur',
            'description' => 'Jenang & madu mongso',
            'user_id'     => 26,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'CV. Reva Coffindo Jaya Abadi',
            'description' => 'Kopi bubuk, kopi susu & Kopi gula',
            'user_id'     => 27,
            'category_id' => 2,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Berkah adi putro',
            'description' => 'Frozen food, olahan ikan',
            'user_id'     => 28,
            'category_id' => 2,
        ]);


        DB::table('ukm')->insert([
            'name'        => 'Retno sembodo',
            'description' => 'Batik tulis',
            'user_id'     => 29,
            'category_id' => 3,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'LPK Mandiri',
            'description' => 'Aneka baju pengantin, kebaya',
            'user_id'     => 30,
            'category_id' => 3,
        ]);
        DB::table('ukm')->insert([
            'name'        => 'Zakia',
            'description' => 'Batik tulis',
            'user_id'     => 31,
            'category_id' => 3,
        ]);
    }

    private function detail() {
        DB::table('ukm_details')->insert([
            'ukm_id'    => 1, 
            'type'      => 'telepon',
            'contact'   => '081555684237',
        ]);
        DB::table('ukm_details')->insert([
            'ukm_id'    => 2, 
            'type'      => 'telepon',
            'contact'   => '085646822955',
        ]);
        DB::table('ukm_details')->insert([
            'ukm_id'    => 3, 
            'type'      => 'telepon',
            'contact'   => '081334734775',
        ]);
        
        DB::table('ukm_details')->insert([
            'ukm_id'    => 5, 
            'type'      => 'telepon',
            'contact'   => '085235635999',
        ]);
        DB::table('ukm_details')->insert([
            'ukm_id'    => 6, 
            'type'      => 'telepon',
            'contact'   => '081334767432',
        ]);
        DB::table('ukm_details')->insert([
            'ukm_id'    => 9, 
            'type'      => 'telepon',
            'contact'   => '0342552143',
        ]);
    }
}
