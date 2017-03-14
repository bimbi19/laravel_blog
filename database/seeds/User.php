<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'android',
            'name' => 'android',
            'email' => 'android'.'@gmail.com',
            'password' => bcrypt('android'),
            'level_pengguna' => 'pengguna',
        ]);
    }
}
