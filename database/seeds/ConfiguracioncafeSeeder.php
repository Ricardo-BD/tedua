<?php

use Illuminate\Database\Seeder;
use App\Configuracioncafe;

class ConfiguracioncafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Configuracioncafe::create([
            'titulo_sistema' => 'Tedua Cafe',
            'nombre_impuesto' => 'IVA',
            'valor_impuesto' => '16',
            'simbolo' => '$',
            'logo'  => '',
            'fondo'  => '', 
            'footer_pdf'  => 'Sistema Tedua Café - Powered By Manthicora', 
            'titulo_ticket'  => 'Sistema de Restaurante', 
            'encabezado_1'  => 'Encabezado de Ticket', 
            'encabezado_2'  => 'Dirección de Comercio', 
            'nit'  => 'NIT: 123456789',
            'direccion'  => 'Av. S/n 123 Mex, Col Xdxd, Mexico CP 12345', 
            'telefono' => '+521123456789',
        ]);
    }
}
