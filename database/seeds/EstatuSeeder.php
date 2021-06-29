<?php

use Illuminate\Database\Seeder;
use App\Estatu;

class EstatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Estatu::create([
        	'nombre' => 'Disponible'
        ]);
        Estatu::create([
        	'nombre' => 'Ocupado'
        ]);
        Estatu::create([
        	'nombre' => 'Mantenimiento'
        ]);
        Estatu::create([
        	'nombre' => 'Inactivo'
        ]);
    }
}
