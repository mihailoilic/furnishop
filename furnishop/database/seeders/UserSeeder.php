<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{


    private $users = [

        [
            "first_name"=>"Test",
            "last_name"=>"Korisnik",
            "email"=>"korisnik@mail.com",
            "password"=>"f5ebb11c65ce6bf63d43b88d1129c8ca",
            "role_id"=>1

        ],
        [
            "first_name"=>"Mihailo",
            "last_name"=>"Ilic",
            "email"=>"mihailo@mail.com",
            "password"=>"f5ebb11c65ce6bf63d43b88d1129c8ca",
            "role_id"=>1

        ],
        [
            "first_name"=>"Admin",
            "last_name"=>"Account",
            "email"=>"admin@mail.com",
            "password"=>"2e33a9b0b06aa0a01ede70995674ee23",
            "role_id"=>2

        ],

    ];

    public function run()
    {
        foreach($this->users as $user)
        {
            User::create($user);
        }
    }
}
