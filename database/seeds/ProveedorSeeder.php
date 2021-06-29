<?php

use Illuminate\Database\Seeder;
use App\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Proveedor::create([
            'rut' => 'XAXX010101000',
            'nombre' => 'Empresa de pruebas',
            'apellido' => 'x',
            'direccion' => 'Neza City',
            'email' => 'joshua_gonzalezg@hotmail.com',
            'telefono' => '+525548795623',
            'celular' => '+525548795623',
            'contacto' => '',
            'sitio_web' => '',
            'es_empresa' => 1,
        ]);
    }
}
