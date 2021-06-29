<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatuscocina extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
