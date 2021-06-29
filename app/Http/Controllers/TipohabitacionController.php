<?php

namespace App\Http\Controllers;

use App\Tipohabitacion;
use App\Categoria;
use Illuminate\Http\Request;

class TipohabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipohabitacion = Tipohabitacion::all();
        return view('tipohabitacion.index', compact('tipohabitacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('tipohabitacion.register', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 
            'codigo'=>'required',
            'titulo'=>'required',
            'descripcion'=>'required',
            'precio_noche'=>'required',
            'precio_mes'=>'required',
            'idcategoria' => 'nullable',
 
        ]);
        Tipohabitacion::create($request->all());
        $tipohabitacion = Tipohabitacion::all();
        return view('tipohabitacion.index', compact('tipohabitacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipohabitacion  $tipohabitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Tipohabitacion $tipohabitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipohabitacion  $tipohabitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipohabitacion $tipohabitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipohabitacion  $tipohabitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[ 
            'codigo'=>'required',
            'titulo'=>'required',
            'descripcion'=>'required',
            'precio_noche'=>'required',
            'precio_mes'=>'required',
            'idcategoria' => 'nullable',
 
        ]);
 
        Tipohabitacion::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipohabitacion  $tipohabitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tipohabitacion::find($id)->delete();
        return back();
    }
}
