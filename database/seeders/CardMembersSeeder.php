<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CardMembers;

class CardMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cardMembers = [
            ['card_id' => 1, 'user_id' => 2],
            ['card_id' => 1, 'user_id' => 3],
            ['card_id' => 1, 'user_id' => 4],
            ['card_id' => 2, 'user_id' => 2],
            ['card_id' => 3, 'user_id' => 3],
            ['card_id' => 4, 'user_id' => 3],
            ['card_id' => 4, 'user_id' => 4],
            ['card_id' => 5, 'user_id' => 4],
            ['card_id' => 6, 'user_id' => 4],
        ];
        CardMembers::insert($cardMembers);
    }
}
