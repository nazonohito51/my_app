<?php

use Illuminate\Database\Seeder;
use App\Tweet;

class TweetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tweet::class, 50)->create();
    }
}
