<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipohabitacion extends Model
{
    //
    protected $fillable = [
    	'titulo', 'codigo', 'descripcion', 'precio_noche', 'precio_mes', 'idcategoria',
    ];
}
