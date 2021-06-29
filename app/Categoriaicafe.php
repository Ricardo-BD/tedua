<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriaicafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
