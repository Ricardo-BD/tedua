<?php

use Illuminate\Database\Seeder;
use App\Formapago;

class FormapagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Formapago::create([
            'nombre' => 'Efectivo',
        ]);
        Formapago::create([
            'nombre' => 'Tarjeta Debito',
        ]);
        Formapago::create([
            'nombre' => 'Cheque',
        ]);
    }
}
