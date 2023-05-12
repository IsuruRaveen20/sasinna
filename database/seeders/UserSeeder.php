<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => 'User']);
        $permission = Permission::create(['name' => 'view users']);
        $permission->assignRole($userRole);

        $userRole = User::factory()->create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $userRole->assignRole('User');
    }
}
