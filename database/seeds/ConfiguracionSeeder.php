<?php

use Illuminate\Database\Seeder;
use App\Configuracion;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Configuracion::create([
            'titulo_sistema' => 'Tedua Hotel',
            'nombre_impuesto' => 'IVA',
            'valor_impuesto' => '16',
            'simbolo' => '$',
        ]);
    }
}
