<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); 
        User::create([ 
              'id' => 1,
              'name' => 'Super Admin',
              'email' => 'admin@test.com',
              'password' => Hash::make('123456'),
              'role' => 'admin'
        ]);

    }
}
