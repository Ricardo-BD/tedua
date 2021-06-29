<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracioncafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'titulo_sistema', 'nombre_impuesto', 'valor_impuesto', 'simbolo', 'logo', 'fondo', 'footer_pdf', 'titulo_ticket', 'encabezado_1', 'encabezado_2', 'nit', 'direccion', 'telefono'    ];
}
