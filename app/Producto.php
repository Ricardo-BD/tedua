<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = [
        'idcategoria', 
        'imagen', 
        'codigo', 
        'nombre', 
        'descripcion', 
        'precio_entrada', 
        'precio_salida', 
        'unidad', 
        'presentacion', 
        'inventario', 
        'idestado',
    ];

    public function getUrlPathAtrribute()
    {
        return \Storage::url($this->path);
    }
}
