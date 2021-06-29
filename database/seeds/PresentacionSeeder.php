<?php

use Illuminate\Database\Seeder;
use App\Presentacion;

class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Presentacion::create([
            'nombre' => 'Paquete',
        ]);
        Presentacion::create([
            'nombre' => 'CH',
        ]);
        Presentacion::create([
            'nombre' => 'MD',
        ]);
        Presentacion::create([
            'nombre' => 'G',
        ]);
    }
}
