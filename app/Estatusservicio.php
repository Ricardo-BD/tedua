<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatusservicio extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'nombre',    
    ];
}
