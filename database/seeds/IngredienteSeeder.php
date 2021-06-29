<?php

use Illuminate\Database\Seeder;
use App\Ingrediente;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ingrediente::create([
            'codigo' => 'AGUA',
            'nombre' => 'Agua',
            'precio_entrada'=> '0.01',
            'precio_salida'=> '0.00', 
            'idcategoria'=> '1',
            'minima_inventario'=> '0',
            'activo'=> 'Si',
        ]);
        Ingrediente::create([
            'codigo' => 'AGUACALIENTE',
            'nombre' => 'Agua Caliente',
            'precio_entrada'=> '0.29',
            'precio_salida'=> '0.00', 
            'idcategoria'=> '1',
            'minima_inventario'=> '0',
            'activo'=> 'Si',
        ]);
        Ingrediente::create([
            'codigo' => 'CAFELIQ',
            'nombre' => '1 oz Café',
            'precio_entrada'=> '1.00',
            'precio_salida'=> '0.00', 
            'idcategoria'=> '1',
            'minima_inventario'=> '0', 
            'activo'=> 'Si',
        ]);
        Ingrediente::create([
            'codigo' => 'LECHE',
            'nombre' => 'Oz de Leche',
            'precio_entrada'=> '0.57',
            'precio_salida'=> '0.00', 
            'idcategoria'=> '1',
            'minima_inventario'=> '0', 
            'activo'=> 'Si',
        ]);
        Ingrediente::create([
            'codigo' => 'SOBREAZUCAR',
            'nombre' => 'Sobre de Azucar Refinada',
            'precio_entrada'=> '0.00',
            'precio_salida'=> '0.00', 
            'idcategoria'=> '1',
            'minima_inventario'=> '0', 
            'activo'=> 'Si',
        ]);
    }
}
