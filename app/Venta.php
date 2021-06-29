<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $fillable = [
        'idproducto', 'pago', 'entrega', 'efectivo', 'descuento', 'idcliente', 'cantidad', 'idventa'
    ];
}
