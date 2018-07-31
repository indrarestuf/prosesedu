<?php

use Illuminate\Database\Seeder;

class PelajaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('pelajarans')->insert([
            'level_id' => 1 ,
            'mapel'=> 'Bahasa Indonesia',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 1 ,
            'mapel'=> 'Bahasa Inggris',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 1 ,
            'mapel'=> 'Matematika',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 1 ,
            'mapel'=> 'IPA',
            ]);
            
            DB::table('pelajarans')->insert([
            'level_id' => 2 ,
            'mapel'=> 'Bahasa Indonesia',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 2 ,
            'mapel'=> 'Bahasa Inggris',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 2 ,
            'mapel'=> 'Matematika',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 2 ,
            'mapel'=> 'Fisika',
            ]);
            DB::table('pelajarans')->insert([
            'level_id' => 2 ,
            'mapel'=> 'Kimia',
            ]);
            
            DB::table('pelajarans')->insert([
            'level_id' => 3 ,
            'mapel'=> 'Bahasa Indonesia',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 3 ,
            'mapel'=> 'Bahasa Inggris',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 3 ,
            'mapel'=> 'Matematika',
            ]);
             DB::table('pelajarans')->insert([
            'level_id' => 3 ,
            'mapel'=> 'Geografi',
            ]);
            DB::table('pelajarans')->insert([
            'level_id' => 3 ,
            'mapel'=> 'Sosiologi',
            ]);
            
            DB::table('pelajarans')->insert([
            'level_id' => 3 ,
            'mapel'=> 'Ekonomi',
            ]);
            
           DB::table('pelajarans')->insert([
            'level_id' => 4 ,
            'mapel'=> 'Saintek',
            ]);
            
            DB::table('pelajarans')->insert([
            'level_id' => 4 ,
            'mapel'=> 'Soshum',
            ]);
            
            DB::table('pelajarans')->insert([
            'level_id' => 4 ,
            'mapel'=> 'TKPA',
            ]);
    }
}
