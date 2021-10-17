<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cards;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cards = [
            ['id' => 1, 'name' => 'Fix issue in website','list_id' => 1],
            ['id' => 2, 'name' => 'Integrate stripe payment','list_id' => 1],
            ['id' => 3, 'name' => 'Change server credentials','list_id' => 2],
            ['id' => 4, 'name' => 'Change user profile page','list_id' => 3],
            ['id' => 5, 'name' => 'Translate content','list_id' => 1],
            ['id' => 6, 'name' => 'ARCA','list_id' => 1],
            ['id' => 7, 'name' => 'JS fix','list_id' => 2],
            ['id' => 8, 'name' => 'CSS fix','list_id' => 2],
        ];
        Cards::insert($cards);
    }
}
