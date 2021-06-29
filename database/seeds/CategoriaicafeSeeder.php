<?php

use Illuminate\Database\Seeder;
use App\Categoriaicafe;

class CategoriaicafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categoriaicafe::create([
            'nombre' => 'Ingredientes',
        ]);
    }
}
