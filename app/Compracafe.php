<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compracafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'idproducto',
        'idtipopago',
        'idestado',
        'total',   
    ];
}
