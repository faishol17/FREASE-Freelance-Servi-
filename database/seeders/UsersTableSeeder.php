<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'              => 'John Doe',
                'email'             => 'john@mail.com',
                'password'          => Hash::make('Admin@12345'),
                'remember_token'    => NULL,
                'remember_token'    => NULL,
                'user_akses'        =>'user',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'name'              => 'Jane Doe',
                'email'             => 'jane@mail.com',
                'password'          => Hash::make('Admin@12345'),
                'user_akses'        =>'user', 
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'name'              => 'Admin',
                'email'             => 'admin@mail.com',
                'password'          => Hash::make('Admin@12345'),
                'user_akses'        =>'user', 
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
        ];

        User::insert($users);
    }
}
