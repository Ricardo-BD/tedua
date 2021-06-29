<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoentrega extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
