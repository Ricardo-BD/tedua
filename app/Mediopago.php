<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mediopago extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
