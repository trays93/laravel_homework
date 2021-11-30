<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'John',
            'lastName'  => 'Doe',
            'email'     => 'john.doe@gmail.com',
            'password'  => Hash::make('secret'),
            'role'      => 'admin'
        ]);

        DB::table('users')->insert([
            'firstName' => 'Jane',
            'lastName'  => 'Doe',
            'email'     => 'jane.doe@gmail.com',
            'password'  => Hash::make('secret'),
            'role'      => 'user'
        ]);
    }
}
