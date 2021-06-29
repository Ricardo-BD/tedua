<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre', 'idseccion', 'tiempo', 'precio',
    ];
}
