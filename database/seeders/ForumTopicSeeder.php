<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum_topics')->insert([
            'title' => 'First topic',
            'description' => "First topic's description",
            'creator_id' => 1
        ]);

        DB::table('forum_topics')->insert([
            'title' => 'Second topic',
            'description' => "Second topic's description",
            'creator_id' => 2
        ]);
    }
}
