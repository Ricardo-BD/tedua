<?php

use Illuminate\Database\Seeder;
use App\Estatuscocina;

class EstatuscocinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Estatuscocina::create([
            'nombre' => 'Pendiente',
        ]);
        Estatuscocina::create([
            'nombre' => 'Cocinado',
        ]);
    }
}
