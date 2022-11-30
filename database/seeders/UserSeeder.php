<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Recht;
use App\Models\Rolle;

use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        ### Laracasts-Tutorial ###
        $recht1 = Recht::create(['name' => 'edit_forum',   'label' => 'Edit the Forum']);
        $recht2 = Recht::create(['name' => 'manage_forum', 'label' => 'Manage the Forum']);
        
        $rolle1 = Rolle::create(['name' => 'editor', 'label' => 'Site Editor']);
        $rolle1->gibRecht($recht1);

        $rolle2 = Rolle::create(['name' => 'manager', 'label' => 'Site Manager']);
        $rolle2->gibRecht($recht1);
        $rolle2->gibRecht($recht2);

        ### spatie-roles-and-permission ###

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);
        $user->gibRolle('editor');   // ### Laracasts-Tutorial: Forum Editor

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);
        $user->gibRolle('manager');   // ### Laracasts-Tutorial: Forum Manager

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}