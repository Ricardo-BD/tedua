<?php

use Illuminate\Database\Seeder;
use App\Rolescafe;

class RolescafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rolescafe::create([
            'nombre' => 'Admin',
        ]);
        Rolescafe::create([
            'nombre' => 'Mostrador',
        ]);
        Rolescafe::create([
            'nombre' => 'Ventas',
        ]);
        Rolescafe::create([
            'nombre' => 'Mesero',
        ]);
        Rolescafe::create([
            'nombre' => 'Cocinero',
        ]);
        Rolescafe::create([
            'nombre' => 'Cajero',
        ]);
    }
}
