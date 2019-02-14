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
        DB::table('users')->insert([
            'name' => 'User1',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('909090'),
        ]);
        DB::table('users')->insert([
            'name'=>'User2',
            'username' => 'admin2',
            'email'=>'user@admin.com',
            'password'=> bcrypt('password'),
        ]);
    }
}
