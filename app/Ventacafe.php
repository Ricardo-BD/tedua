<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventacafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'idventa',
        'idcliente',
        'idestado',
        'idtipopago',
        'idpago',
        'propina',
        'descuento',
        'efectivo',   
    ];
}
