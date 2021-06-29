<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientecafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'direccion',
        'email',
        'telefono',
        'celular',
        'contacto',
        'sitio_web',
        'es_empresa',    
    ];
}
