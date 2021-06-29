<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productocafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'imagen',
        'codigo',
        'nombre',
        'idseccion',
        'idcategoria',
        'descripcion',
        'duracion',
        'precio_entrada',
        'precio_salida',
        'idunidad',
        'idpresentacion',
        'minima_inventario',
        'inventario',
        'idestadus_cocina',
        'idestadus_servicio',
        'activo',
        'usa_inventario',
        'usa_ingredientes',
        'favorito',    
    ];
}
