<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
        	[
        		'name' => 'admin',
	        	'username' => 'admin',
	        	'password' => Hash::make('admin'),
	        	'level' => 'admin',
	        	'telpon' => '0192192',
        	],
        	
        ]);
    }
}
