<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_validador = Role::where('name', 'validador')->first();
        $role_psicologo = Role::where('name', 'psicologo')->first();
        $role_invitado = Role::where('name', 'invitado')->first();

        for ($i=0; $i < 20 ; $i++) { 
            $user = new User();
            $user->name = 'User '.$i;
            $user->email = 'user'.$i.'@example.com';
            $user->email_verified_at = Carbon::now();
            $user->api_token = hash('sha256', hash('sha256', $user->email));
            $user->password = bcrypt('secret');
            $user->save();
            $user->roles()->attach($role_user);
        }

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->email_verified_at = Carbon::now();
        $user->api_token = hash('sha256', hash('sha256', $user->email));
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Validador';
        $user->email = 'validador@example.com';
        $user->email_verified_at = Carbon::now();
        $user->api_token = hash('sha256', hash('sha256', $user->email));
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_validador);

        for ($i=0; $i < 10; $i++) { 
            $user = new User();
            $user->name = 'Psicologo'. $i;
            $user->email = 'psicologo'.$i.'@example.com';
            $user->email_verified_at = Carbon::now();
            $user->api_token = hash('sha256', hash('sha256', $user->email));
            $user->password = bcrypt('secret');
            $user->save();
            $user->roles()->attach($role_psicologo);
        }

        $user = new User();
        $user->name = 'Invitado';
        $user->email = 'invitado@example.com';
        $user->email_verified_at = Carbon::now();
        $user->api_token = hash('sha256', hash('sha256', $user->email));
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_invitado);
    }
}
