<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formapago extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
