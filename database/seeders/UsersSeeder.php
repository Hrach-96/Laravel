<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'admin','email' => 'admin_123@gmail.com','password' => Hash::make('123456789')],
            ['id' => 2, 'name' => 'Dev1','email' => 'Dev1@gmail.com','password' => Hash::make('123456789')],
            ['id' => 3, 'name' => 'Dev2','email' => 'Dev2@gmail.com','password' => Hash::make('123456789')],
            ['id' => 4, 'name' => 'Dev3','email' => 'Dev3@gmail.com','password' => Hash::make('123456789')],
            ['id' => 5, 'name' => 'Dev4','email' => 'Dev4@gmail.com','password' => Hash::make('123456789')],
        ];
        User::insert($users);
    }
}
