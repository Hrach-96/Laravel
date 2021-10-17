<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Lists;

class ListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            ['id' => 1, 'title' => 'In Progress'],
            ['id' => 2, 'title' => 'Urgent'],
            ['id' => 3, 'title' => 'Low priority'],
            ['id' => 4, 'title' => 'High Priority'],
        ];
        Lists::insert($lists);
    }
}
