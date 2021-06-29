<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre', 'codigo', 'precio_entrada', 'precio_salida', 'idcategoria', 'minima_inventario', 'activo'    
    ];
}
