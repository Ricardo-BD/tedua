<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usercafe extends Model
{
    //
    protected $connection = 'tcafe';

    protected $fillable = [
        'name', 'email', 'password', 'nombre_completo', 'idrole'    
    ];
}
