<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private $roles = [
        [
            "name"=>"User"
        ],
        [
            "name"=>"Administrator"
        ],
    ];

    public function run()
    {
        foreach($this->roles as $role){
            Role::create($role);
        }

    }
}
