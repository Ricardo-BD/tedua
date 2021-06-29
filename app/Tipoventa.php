<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoventa extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
