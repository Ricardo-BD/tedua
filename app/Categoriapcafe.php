<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriapcafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
