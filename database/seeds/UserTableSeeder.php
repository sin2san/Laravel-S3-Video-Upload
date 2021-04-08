<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        //Permissions
        Permission::create(['name' => 'manage admins']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage videos']);
        Permission::create(['name' => 'manage dashboard']);
        Permission::create(['name' => 'manage profile']);
        Permission::create(['name' => 'manage option']);

        //Roles
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);

        //Role Permissions
        $role->givePermissionTo(Permission::all());

        //Create Admin User
        $user = User::create([
            'name'      => 'Super Admin',
            'email'      => 'admin@genit.sg',
            'password'   => Hash::make('admin'),
            'remember_token' => md5(microtime().Config::get('app.key')),
        ]);

        $user->assignRole('admin');

        $user->givePermissionTo(Permission::all());
    }
}
