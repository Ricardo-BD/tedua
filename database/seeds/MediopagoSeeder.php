<?php

use Illuminate\Database\Seeder;
use App\Mediopago;

class MediopagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mediopago::create([
            'nombre' => 'Efectivo'

        ]);
        Mediopago::create([
            'nombre' => 'Tarjeta Debito'

        ]);
        Mediopago::create([
            'nombre' => 'Cheque'

        ]);
    }
}
