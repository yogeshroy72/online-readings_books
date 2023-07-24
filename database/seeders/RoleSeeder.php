<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            [
                'name'=>'Admin',
                'guard_name'=>'web',
            ],
            [
                'name'=>'User',
                'guard_name'=>'web',
            ],
        ];
        foreach ($roles as $key => $role) {
            Role::create($role);
        }
        // $user=User::where('name','Admin')->first();
        // $role=Role::where('name','Admin')->first();
        // if($user){
        //     $user->assignRole($role);
        // }
    }
}
