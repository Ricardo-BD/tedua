<?php

use Illuminate\Database\Seeder;
use App\Tipoventa;

class TipoventaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipoventa::create([
            'nombre' => 'Venta en el Restaurante'
        ]);
        Tipoventa::create([
            'nombre' => 'Para llevar'
        ]);
        Tipoventa::create([
            'nombre' => 'Delivery'
        ]);

    }
}
