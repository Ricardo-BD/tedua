<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    //
    protected $fillable = [
        'titulo_sistema', 'nombre_impuesto', 'valor_impuesto', 'simbolo',
    ];
}
