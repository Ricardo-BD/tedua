<?php

use Illuminate\Database\Seeder;
use App\Clientecafe;

class ClientecafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Clientecafe::create([
            'rut' => 'XAXX010101000',
            'nombre' => 'Venta',
            'apellido' => 'Mostrador',
            'direccion' => 'XXXX',
            'email' => 'XXXX@XXXX',
            'telefono' => 'XXXX',
            'celular' => 'XXXX',
            'contacto' => 'XXXX',
            'sitio_web' => 'XXXX',
            'es_empresa' => 0,
        ]);
    }
}
