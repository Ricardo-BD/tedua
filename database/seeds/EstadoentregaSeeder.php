<?php

use Illuminate\Database\Seeder;
use App\Estadoentrega;

class EstadoentregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Estadoentrega::create([
            'nombre' => 'Entregado'

        ]);
        Estadoentrega::create([
            'nombre' => 'Pendiente'

        ]);
        Estadoentrega::create([
            'nombre' => 'Cancelado'

        ]);
    }
}
