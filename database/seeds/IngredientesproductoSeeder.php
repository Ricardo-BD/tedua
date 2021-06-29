<?php

use Illuminate\Database\Seeder;
use App\Ingredientesproducto;

class IngredientesproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ingredientesproducto::create([
            'idproducto' => '1',
            'idingrediente' => '3',
            'cantidad' => '2',
            'es_requerido' => 1,
        ]);
        Ingredientesproducto::create([
            'idproducto' => '1',
            'idingrediente' => '4',
            'cantidad' => '6',
            'es_requerido' => 1,
        ]);
        Ingredientesproducto::create([
            'idproducto' => '1',
            'idingrediente' => '5',
            'cantidad' => '2',
            'es_requerido' => 0,
        ]);

    }
}
