<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);
        $principle = Role::create(['name' => 'principle']);
        $sectionalHead = Role::create(['name' => 'sectionalHead']);
        $dean = Role::create(['name' => 'dean']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $parent = Role::create(['name' => 'parent']);

        $this->crudAndRolePermission('student', $admin);
        $this->crudAndRolePermission('student', $principle);
        $this->crudAndRolePermission('student', $sectionalHead);
        $this->crudAndRolePermission('student', $dean);
        $this->viewRolePermission('student', $supervisor);

    }

    public function viewRolePermission($key, $role): void
    {
        Permission::firstOrCreate(['name' => $key . '.view']);
        $role->givePermissionTo($key . '.view');
    }

        public function crudAndRolePermission($key, $role): void
        {
        $this->viewRolePermission($key, $role);

        Permission::firstOrCreate(['name' => $key.'.create']);
            $role->givePermissionTo($key.'.create');

        Permission::firstOrCreate(['name' => $key.'.update']);
            $role->givePermissionTo($key.'.update');

        Permission::firstOrCreate(['name' => $key.'.delete']);
            $role->givePermissionTo($key.'.delete');
    }
}
