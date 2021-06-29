<?php

use Illuminate\Database\Seeder;
use App\Categoriapcafe;

class CategoriapcafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categoriapcafe::create([
            'nombre' => 'Bebidas',
        ]);
        Categoriapcafe::create([
            'nombre' => 'Alimentos',
        ]);
    }
}
