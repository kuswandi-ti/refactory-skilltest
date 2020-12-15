<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' 		=> 'kuswandi',
        	'email' 	=> 'kuswandi.ti@gmail.com',
        	'password' 	=> bcrypt('administrator'),
            'photo'     => 'https://kuswandi.scriptproject.web.id/refactory/admin.png',
        ]);
    }
}
