<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
    	 'cedula', 'nombre', 'apellido', 'direccion', 'telefono', 'email',
    ];
}
