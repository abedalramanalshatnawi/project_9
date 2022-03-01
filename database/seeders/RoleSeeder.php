<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->insert([
        //     'name'=>Str::random(10),
        //     ''=>Str::random(10),

        // ]);
        Role::create([
            'role_name'=>"user",
 
         ]);
         Role::create([
            'role_name'=>"admin",
 
         ]);
    }
}
