<?php

use Illuminate\Database\Seeder;
use App\Delivery;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Delivery::create([
            'nombre' => 'DIDI',
            'tiempo' => 0,
            'precio' => 0,
        ]);
        Delivery::create([
            'nombre' => 'Rappi',
            'tiempo' => 0,
            'precio' => 0,
        ]);
        Delivery::create([
            'nombre' => 'Uber East',
            'tiempo' => 0,
            'precio' => 0,
        ]);

    }
}
