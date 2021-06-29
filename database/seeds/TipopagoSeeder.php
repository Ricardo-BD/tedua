<?php

use Illuminate\Database\Seeder;
use App\Tipopago;

class TipopagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipopago::create([
            'nombre' => 'Pagado'

        ]);
        Tipopago::create([
            'nombre' => 'Pendiente'

        ]);
        Tipopago::create([
            'nombre' => 'Cancelado'

        ]);
        Tipopago::create([
            'nombre' => 'Credito'

        ]);
    }
}
