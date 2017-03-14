<?php

use Illuminate\Database\Seeder;



class ArikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('artikel')->insert([
            'id_artikel' => 2,
            'user_id' => 1,
            'judul' => 'membangun desa',
            'slug_judul' => 'membangun-desa',
            'isi' => 'bjbfajbaj',
            'komentar' => 'abfab',
            'rating' => 'abfab',            
            'gambar' => 'abfab',   

        ]);
    }
}
