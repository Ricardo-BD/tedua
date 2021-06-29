<?php

use Illuminate\Database\Seeder;
use App\Categoriap;

class CategoriapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categoriap::create([
            'nombre' => 'Ninguna'
        ]);
        Categoriap::create([
            'nombre' => 'Bebidas'
        ]);
    }
}
