<?php

use Illuminate\Database\Seeder;
use App\Mesa;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mesa::create([
            'nombre' => 'Mesa 001',
            'idseccion' => 1,
            'tiempo' => 0,
            'precio' => 0,
        ]);
        Mesa::create([
            'nombre' => 'Mesa 002',
            'idseccion' => 1,
            'tiempo' => 0,
            'precio' => 0,
        ]);
        Mesa::create([
            'nombre' => 'Mesa 003',
            'idseccion' => 1,
            'tiempo' => 0,
            'precio' => 0,
        ]);
        Mesa::create([
            'nombre' => 'Mesa 004',
            'idseccion' => 1,
            'tiempo' => 0,
            'precio' => 0,
        ]);
        Mesa::create([
            'nombre' => 'Mesa 005',
            'idseccion' => 1,
            'tiempo' => 0,
            'precio' => 0,
        ]);
    }
}
