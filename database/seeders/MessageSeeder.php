<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'title'         => 'First message',
            'body'          => "First message's body",
            'sender_id'     => 2,
            'to_id'         => 1,
            'created_at'    => new DateTime(),
        ]);

        DB::table('messages')->insert([
            'title'         => 'Second message',
            'body'          => "Second message's body",
            'sender_id'     => 2,
            'to_id'         => 1,
            'created_at'    => new DateTime(),
        ]);
        
        DB::table('messages')->insert([
            'title'         => 'Third message',
            'body'          => "Third message's body",
            'sender_id'     => 1,
            'to_id'         => 2,
            'created_at'    => new DateTime(),
        ]);
    }
}
