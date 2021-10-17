<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
	        UsersSeeder::class,
            ListsSeeder::class,
            CardsSeeder::class,
            CardMembersSeeder::class,
            CommentsSeeder::class,
	    ]);
    }
}