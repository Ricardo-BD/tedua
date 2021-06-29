<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
    protected $fillable = [
        'idproducto', 'pago', 'entrega', 'total', 'efectivo', 'cantidad'
    ];
}
