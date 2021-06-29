<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventadelivery extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'idproducto',
        'idmesero',
        'idservicio',
        'idtipoventa',
        'cantidad',
        'pendiente',   
    ];
}
