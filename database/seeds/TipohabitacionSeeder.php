<?php

use Illuminate\Database\Seeder;
use App\Tipohabitacion;

class TipohabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipohabitacion::create([
        	'titulo' => 'Melody',
        	'codigo' => '001',
        	'descripcion' => 'Melody',
        	'precio_noche' => '10',
        	'precio_mes' => '30',
        	'idcategoria' => '1',
        ]);

        Tipohabitacion::create([
        	'titulo' => 'Harmony',
        	'codigo' => '002',
        	'descripcion' => 'Harmony',
        	'precio_noche' => '10',
        	'precio_mes' => '30',
        	'idcategoria' => '1',
        ]);
    }
}
