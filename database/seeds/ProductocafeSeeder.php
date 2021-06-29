<?php

use Illuminate\Database\Seeder;
use App\Productocafe;

class ProductocafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Productocafe::create([
            'imagen'=> null,
            'codigo'=> 'CAPMDNATURAL',
            'nombre'=> 'Capuchino Natural',
            'idseccion'=>null,
            'idcategoria'=>'2',
            'descripcion'=>'Capuchino Natural Mediano',
            'duracion'=>'5',
            'precio_entrada'=>'6',
            'precio_salida'=>'22',
            'idunidad'=>null,
            'idpresentacion'=>'3',
            'minima_inventario'=>'10',
            'inventario'=>'10',
            'idestadus_cocina'=>'1',
            'idestadus_servicio'=>'1',
            'activo'=>'1',
            'usa_inventario'=>'0',
            'usa_ingredientes'=>'1',
            'favorito'=>'1',    
        ]);  
    }
}
