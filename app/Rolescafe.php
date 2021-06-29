<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolescafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',
    ];
}
