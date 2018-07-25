<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('levels')->insert([
            'jenjang' => 'SMP',
            ]);
            DB::table('levels')->insert([
            'jenjang' => 'SMA',
            ]);
            DB::table('levels')->insert([
            'jenjang' => 'PTN',
            ]);
    }
}
