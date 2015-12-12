<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Matt',
            'email'=> 'morgandozy@gmail.com',
            'password' => bcrypt('test'),
            'role_id' => '4'
        ]);
    }
}
