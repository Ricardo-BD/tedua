<?php

use Illuminate\Database\Seeder;
use App\Seccion;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Seccion::create([
            'nombre' => 'Cafeteria',
        ]);
        Seccion::create([
            'nombre' => 'DIDI',
        ]);
        Seccion::create([
            'nombre' => 'Rappi',
        ]);
        Seccion::create([
            'nombre' => 'Uber East',
        ]);
    }
}
