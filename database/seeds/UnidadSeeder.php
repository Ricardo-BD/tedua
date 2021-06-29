<?php

use Illuminate\Database\Seeder;
use App\Unidad;
class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Unidad::create([
            'nombre' => 'Oz'
        ]);
        Unidad::create([
            'nombre' => 'ml'
        ]);
        Unidad::create([
            'nombre' => 'L'
        ]);
        Unidad::create([
            'nombre' => 'gr'
        ]);
        Unidad::create([
            'nombre' => 'Kg'
        ]);
    }
}
