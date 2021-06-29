<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre', 'tiempo', 'precio',
    ];
}
