<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forum_comments')->insert([
            'comment' => "First topic's first comment",
            'forum_topic_id' => 1,
            'user_id' => 1
        ]);

        DB::table('forum_comments')->insert([
            'comment' => "First topic's second comment",
            'forum_topic_id' => 1,
            'user_id' => 2
        ]);

        DB::table('forum_comments')->insert([
            'comment' => "Second topic's first comment",
            'forum_topic_id' => 2,
            'user_id' => 2
        ]);
    }
}
