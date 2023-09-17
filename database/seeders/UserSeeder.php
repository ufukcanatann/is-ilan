<?php

namespace Database\Seeders;

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
        $names = ['Ufuk', 'Ali', 'Ahmet', 'Mehmet', 'Hasan'];
        $usersNumber = 5;
        for ($i = 0; $i < $usersNumber; $i++) {
            $randomName = $names[array_rand($names)];
            DB::table('users')->insert([
                'roleid' => rand(0, 2),
                'name' => $randomName,
                'email' => $randomName . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }

    }
}
