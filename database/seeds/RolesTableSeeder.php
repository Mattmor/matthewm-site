<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Member',
            'slug' => 'member',
            'description' => 'Base level of a user',
            'level' => '1',
        ]);
        DB::table('roles')->insert([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => 'Moderator can edit certain things',
            'level' => '2',
        ]);
        DB::table('roles')->insert([
            'name' => 'Family',
            'slug' => 'family',
            'description' => 'Family can access certain stuff',
            'level' => '3',
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin can do anything.',
            'level' => '4',
        ]);
    }
}
