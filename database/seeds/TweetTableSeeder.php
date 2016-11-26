<?php

use Illuminate\Database\Seeder;
use App\Tweet;
use App\User;

class TweetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            factory(Tweet::class, 20)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
