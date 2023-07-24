<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=[
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password')
        ];
       $admin= User::create($user);
        $role=Role::where('name','Admin')->first();
        $admin->assignRole($role);
    }
}
