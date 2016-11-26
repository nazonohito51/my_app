<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

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
            factory(User::class)->create([
                'name' => $name,
                'email' => $email,
            ]);
        }

        $this->call(TweetTableSeeder::class);
    }
}
