<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'ukm_id'      => 1,
            'alamat'      => 'Sidodadi',
            'kecamatan'   => 'Garum',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.24982,
            'latitude'    => -8.03441,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 2,
            'alamat'      => 'Kademangan',
            'kecamatan'   => 'Kademangan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.14851,
            'latitude'    => -8.14531,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 3,
            'alamat'      => 'Plumpungrejo',
            'kecamatan'   => 'Kademangan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.13205,
            'latitude'    => -8.14692,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 4,
            'alamat'      => 'Jiwut',
            'kecamatan'   => 'Nglegok',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.20105,
            'latitude'    => -8.06263,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 5,
            'alamat'      => 'Kemloko',
            'kecamatan'   => 'Nglegok',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.19479,
            'latitude'    => -8.03152,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 6,
            'alamat'      => 'Modangan',
            'kecamatan'   => 'Nglegok',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.22569,
            'latitude'    => -8.0135,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 7,
            'alamat'      => 'Jl. Basuki rahmat No. 95. RT/RW 06/02',
            'kecamatan'   => 'Sutojayan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.21979,
            'latitude'    => -8.16785,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 8,
            'alamat'      => 'Kalipang',
            'kecamatan'   => 'Sutojayan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.22271,
            'latitude'    => -8.17276,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 9,
            'alamat'      => 'Bajang',
            'kecamatan'   => 'Talun',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.29943,
            'latitude'    => -8.09665,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 10,
            'alamat'      => 'Tangkil',
            'kecamatan'   => 'Wlingi',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.32621,
            'latitude'    => -8.09915,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 11,
            'alamat'      => 'Tawangrejo',
            'kecamatan'   => 'Binangun',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.34259,
            'latitude'    => -8.17233,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 12,
            'alamat'      => 'Resapombo',
            'kecamatan'   => 'Doko',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.43703,
            'latitude'    => -8.03116,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 13,
            'alamat'      => 'Sumberdiren',
            'kecamatan'   => 'Garum',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.21286,
            'latitude'    => -8.07348,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 14,
            'alamat'      => 'Jl. Benteng blorok',
            'kecamatan'   => 'Kademangan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.17174,
            'latitude'    => -8.15678,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 15,
            'alamat'      => 'Rejowinangun',
            'kecamatan'   => 'Kademangan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.15487,
            'latitude'    => -8.14883,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 16,
            'alamat'      => 'Rejowinangun',
            'kecamatan'   => 'Kademangan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.15743,
            'latitude'    => -8.14742,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 17,
            'alamat'      => 'Gogodeso',
            'kecamatan'   => 'Kanigoro',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.19202,
            'latitude'    => -8.14031,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 18,
            'alamat'      => 'Gogodeso',
            'kecamatan'   => 'Kanigoro',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.19153,
            'latitude'    => -8.14011,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 19,
            'alamat'      => 'Gogodeso',
            'kecamatan'   => 'Kanigoro',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.19267,
            'latitude'    => -8.14525,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 20,
            'alamat'      => 'Jugo',
            'kecamatan'   => 'Kesamben',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.36597,
            'latitude'    => -8.16982,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 21,
            'alamat'      => 'Sumber',
            'kecamatan'   => 'Sanankulon',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.1335,
            'latitude'    => -8.07567,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 22,
            'alamat'      => 'Sumberejo',
            'kecamatan'   => 'Sanankulon',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.1523,
            'latitude'    => -8.06559,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 23,
            'alamat'      => 'Maron',
            'kecamatan'   => 'Srengat',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.07642,
            'latitude'    => -8.08889,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 24,
            'alamat'      => 'Srengat',
            'kecamatan'   => 'Srengat',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.07285,
            'latitude'    => -8.05832,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 25,
            'alamat'      => 'Jl. Cempaka No. 1 RT/RW. 03/02',
            'kecamatan'   => 'Sutojayan',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.22958,
            'latitude'    => -8.16693,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 26,
            'alamat'      => 'Bendosewu',
            'kecamatan'   => 'Talun',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.27225,
            'latitude'    => -8.1204,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 27,
            'alamat'      => 'Jeblog',
            'kecamatan'   => 'Talun',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.25959,
            'latitude'    => -8.12259,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 28,
            'alamat'      => 'Gandunsari',
            'kecamatan'   => 'Gandunsari',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.30614,
            'latitude'    => -8.04404,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 29,
            'alamat'      => 'Pojok',
            'kecamatan'   => 'Garum',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.21244,
            'latitude'    => -8.06028,
        ]);
        DB::table('locations')->insert([
            'ukm_id'      => 30,
            'alamat'      => 'Jugo',
            'kecamatan'   => 'Kesamben',
            'kabupaten'   => 'Blitar',
            'longitude'   => 112.37282,
            'latitude'    => -8.16488,
        ]);
    }
}
