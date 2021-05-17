<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama'          => 'Admin Pariwisata',  
            'username'      => 'admin',  
            'email'         => 'admin@gmail.com',  
            'password'      => Hash::make('admin'),
            'foto'          => 'default.jpg',
            'level'         => '1',
            'status'        => '1',
        ]);
    }
}
