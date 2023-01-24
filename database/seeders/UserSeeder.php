<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class UserSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
        [
            [
                'email' => 'user@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'user'
            ],
            [
                'email' =>'admin@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'admin'
            ],
            [
                'email' => 'administrator@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'System Administrator'
            ],
        ];

        foreach($users as $key=> $value)
        {
            User::create($value);
            if($value= 'user@gmail.com')
            {
                $user = User::latest();
                $user->assignRole('Admin');
            }

        }
    }
}
