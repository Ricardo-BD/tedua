<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'nombre' => 'Admin',
        ]);
        Role::create([
            'nombre' => 'Mostrador',
        ]);
        Role::create([
            'nombre' => 'Ventas',
        ]);
        Role::create([
            'nombre' => 'Mesero',
        ]);
        Role::create([
            'nombre' => 'Cocinero',
        ]);
        Role::create([
            'nombre' => 'Cajero',
        ]);
    }
}
