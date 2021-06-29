<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredientesproducto extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'idproducto', 'idingrediente', 'cantidad', 'es_requerido'   
    ];
}
