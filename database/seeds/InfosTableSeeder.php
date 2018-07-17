<?php

use Illuminate\Database\Seeder;

class InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tutor
            DB::table('infos')->insert([
            'user_id' => 1,
            'untuk' => 'Tutor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //Murid
            DB::table('infos')->insert([
            'user_id' => 1,
            'untuk' => 'Siswa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
