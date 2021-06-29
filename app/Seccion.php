<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
