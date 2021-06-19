<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds for user sample.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'admin',
                    'email' => 'admin@mail.com',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => 'user',
                    'email' => 'test@mail.com',
                    'password' => Hash::make('password'),
                ],
                
            ]);
    }
}
