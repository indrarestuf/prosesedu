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
        //admin
            DB::table('users')->insert([
            'name' => 'Admin Proses',
            'email' =>'prosesedu@gmail.com',
            'password' => bcrypt('prosesedu123'),
            'role'=>'0',
            'username' => 'admin',
        ]);
    }
}
