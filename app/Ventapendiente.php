<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventapendiente extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'idproducto',
        'idmesero',
        'idmesa',
        'idtipoventa',
        'cantidad',
        'pendiente',   
    ];
}
