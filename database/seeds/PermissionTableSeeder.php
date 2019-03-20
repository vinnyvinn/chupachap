<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dev_role = Role::where('name','developer')->first();
        $manager_role = Role::where('name', 'manager')->first();

        $createTasks = new Permission();
        $createTasks->name = 'create-tasks';
        $createTasks->name = 'Create Tasks';
        $createTasks->save();
        $createTasks->roles()->attach($dev_role);

        $editUsers = new Permission();
        $editUsers->name = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);
    }
}
