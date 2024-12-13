<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'show news',  'create news', 'update news', 'delete news',
            'show blogs', 'create blogs', 'update blogs', 'delete blogs',
            'show users', 'create users', 'update users', 'delete users',
            'show roles', 'create roles', 'update roles', 'delete roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo($permissions);

        Role::create(['name' => 'User']);
    }
}
