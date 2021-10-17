<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $comments = [
	        ['content' => 'Finished', 'card_id' => 2, 'user_id' => 2],
	        ['content' => 'Bug Found!', 'card_id' => 2, 'user_id' => 5],
	        ['content' => 'Some issue', 'card_id' => 3, 'user_id' => 3],
            ['content' => 'New credentials', 'card_id' => 1, 'user_id' => 4],
	    ];

	    Comments::insert($comments);
    }
}
