<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UserTableSeeder extends Seeder
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
        $dev_perm = Permission::where('name','create-tasks')->first();
        $manager_perm = Permission::where('name','edit-users')->first();

        $developer = new User();
        $developer->name = 'Fredrick Boaz';
        $developer->email = 'boaz@wizag.biz';
        $developer->password = bcrypt('watoto2012');
        
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);


        $manager = new User();
        $manager->name = 'Vincent Kituyi';
        $manager->email = 'v.kituyi@wizag.biz';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);

    }
}
