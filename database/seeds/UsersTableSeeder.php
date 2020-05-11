<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Samet Mert',
            'last_name' => 'Öztürk',
            'email' => 'sametmertozturk1@gmail.com',
            'password' => bcrypt('25683212'),
            'remember_token' => Str::random(12),
        ]);
        //
    }
}
