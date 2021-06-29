<?php

use Illuminate\Database\Seeder;
use App\Estatusservicio;

class EstatusservicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Estatusservicio::create([
            'nombre' => 'Pendiente',
        ]);
        Estatusservicio::create([
            'nombre' => 'Servido',
        ]);
    }
}
