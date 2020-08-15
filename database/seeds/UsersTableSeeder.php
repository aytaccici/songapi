<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        factory(User::class, 10)->create();

        $me = [
            'name'              => 'Aytaç Cici',
            'email'             => 'aytaccici@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
            'api_token'         => Str::random(60),
        ];

        User::create($me);
    }
}
