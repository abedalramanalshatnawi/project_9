<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'expert_name'=>'user1',
            'email'=>'user1@gmail.com',
            'password'=>123,
            'role_id'=>1
        ]);
        User::create([
            'expert_name'=>'user2',
            'email'=>'user2@gmail.com',
            'password'=>123,
            'role_id'=>1
        ]);
        User::create([
            'expert_name'=>'user3',
            'email'=>'user3@gmail.com',
            'password'=>123,
            'role_id'=>1
        ]);
    }
}
