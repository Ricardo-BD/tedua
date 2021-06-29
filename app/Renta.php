<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    //
    protected $fillable = [
        'idcliente', 'idtipohabitacion', 'idhabitacion', 'idprecio_noche', 'idprecio_mes', 'fecha_inicio', 'fecha_fin', 'costo', 'check_in', 'check_out',
    ];
}
