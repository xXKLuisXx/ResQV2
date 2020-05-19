<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'validador';
        $role->description = 'validador';
        $role->save();

        $role = new Role();
        $role->name = 'psicologo';
        $role->description = 'Psicologo';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Usuario';
        $role->save();

        $role = new Role();
        $role->name = 'invitado';
        $role->description = 'Invitado';
        $role->save();
    }
}
