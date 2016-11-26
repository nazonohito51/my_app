<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserProfile;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_info = [
            'ロリポおじさん' => 'test1@test.com',
            'ツッキー' => 'test2@test.com',
            'ミンチー' => 'test3@test.com',
            'ロース' => 'test4@test.com',
        ];
        
        foreach ($users_info as $name => $email) {
            $user = factory(User::class)->create([
                'name' => $name,
                'email' => $email,
            ]);

            $user->user_profile()->save(factory(UserProfile::class)->make());
        }

        $this->call(TweetTableSeeder::class);
    }
}
