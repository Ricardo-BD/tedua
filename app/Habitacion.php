<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    //
    protected $fillable = [
    	'idhabitacion', 'idestatus', 'codigo', 
    ];
}
