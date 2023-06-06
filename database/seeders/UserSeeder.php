<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            [
                'name' => 'test-admin',
                'email' => 'testing.admin@gmail.com',
                'password' => 'Adm1nT3st',
                'role' => 'admin'
            ]
        ]);
    }
}
